<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <div class="fw-bold pe-2">
                    {{ $post->user->name }}
                </div>
                <div class="fw-light text-muted" id="test">
                    {{ $post->created_at }}
                </div>
            </div>
            @if (Auth::id() === $post->user_id)
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        設定
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
    <div class="card-body position-relative">
        <p class="card-text mb-0" id="postText_{{ $post->id }}">
            {!! nl2br(e($post->text)) !!}
        </p>
        <a @class(['stretched-link' => $useStretchedLink]) href="{{ route('posts.show', ['post' => $post]) }}"></a>
    </div>
    <div class="card-footer text-muted">
        いいね
    </div>
</div>
