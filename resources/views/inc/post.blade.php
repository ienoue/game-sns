<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <div class="fw-bold pe-2">
                    <a class="text-reset text-decoration-none"
                        href="{{ route('users.index', ['name' => $post->user->name]) }}">{{ $post->user->name }}
                    </a>
                </div>
                <div class="fw-light text-muted" id="test">
                    {{ $post->updated_at }}
                </div>
            </div>
            @if (Auth::id() === $post->user_id)
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="postSetting"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        設定
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="postSetting">
                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#modalEdit_{{ $post->id }}">記事編集</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete_{{ $post->id }}">記事削除</a></li>
                    </ul>
                </div>

                {{-- 編集用モーダル --}}
                <div class="modal fade" id="modalEdit_{{ $post->id }}" tabindex="-1"
                    aria-labelledby="modalEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel">編集</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger d-none">
                                    <ul id="formErr_{{ $post->id }}" class="mb-0">
                                    </ul>
                                </div>
                                <form id="formEdit_{{ $post->id }}" onsubmit="return false" method="POST"
                                    action="{{ route('posts.update', ['post' => $post->id]) }}">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" name="text"
                                            placeholder="好きな話題を投稿してみよう">{{ $post->text ?? old('text') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control customLook" name="tags"
                                            value="{{ $post->tags->implode('name', ', ') }}"
                                            placeholder="タグを5個まで入力できます">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                <button type="button" class="btn btn-primary btn-edit"
                                    data-post-id="{{ $post->id }}">更新する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /編集用モーダル --}}

                {{-- 削除用モーダル --}}
                <div class="modal fade" id="modalDelete_{{ $post->id }}" tabindex="-1"
                    aria-labelledby="modalDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDeleteLabel">確認</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    投稿を削除します。よろしいですか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                    <button type="submit" class="btn btn-danger">削除する
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- /削除用モーダル --}}
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="card-text position-relative">
            <a @class(['stretched-link' => $stretchedLink]) href="{{ route('posts.show', ['post' => $post]) }}"></a>
            <p @class([
                'card-text',
                'text-truncate',
                'row-5' => $charLimit,
            ]) id="postText_{{ $post->id }}">
                {!! nl2br(e($post->text)) !!}
            </p>
        </div>
        <div id="postTag_{{ $post->id }}" class="card-text">
            @if ($post->tags->count() >= 1)
                <div class="mt-2">
                    @foreach ($post->tags as $tag)
                        <a class="btn btn-outline-secondary btn-sm lh-1 me-1 mb-1 text-truncate mw-200px"
                            href="{{ route('search', ['tag' => $tag->name]) }}"
                            role="button">{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="card-footer text-muted d-flex align-items-baseline">
        <button type="button" class="text-muted btn btn-like" href="#" data-post-id="{{ $post->id }}"
            @cannot('toggle-like', $post) disabled @endcannot>
            <i @class([
                'fa-solid',
                'fa-heart',
                'me-2',
                'text-red' => $post->isLikedBy(Auth::user()),
            ])></i>
        </button>
        <p class="card-text" id="likecount_{{ $post->id }}">{{ $post->likes->count() }} いいね</p>
    </div>
</div>
