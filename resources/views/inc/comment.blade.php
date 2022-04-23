{{-- コメント --}}
<div class="d-flex justify-content-between align-items-center px-3 mb-1">
    <div class="d-flex align-items-center">

        {{-- モンスター画像 --}}
        <a href="{{ route('monsters.show', ['monster' => $comment->user->partner]) }}">
            <img src="{{ $comment->user->partner->small_image_path }}" class="rounded-circle border me-2" alt="モンスター"
                style="width:2.5rem;height:2.5rem;">
        </a>
        {{-- /モンスター画像 --}}

        <div>
            {{-- 名前 --}}
            <a class="fw-bold text-reset text-decoration-none me-2"
                href="{{ route('users.index', ['name' => $comment->user->name]) }}">{{ $comment->user->name }}
            </a>
            {{-- /名前 --}}

            {{-- 日付 --}}
            <div class="fw-light text-muted" id="test">
                {{ $comment->updated_at }}
            </div>
            {{-- /日付 --}}
        </div>
    </div>

    {{-- コメント編集メニュー --}}
    @if (Auth::id() === $comment->user_id)
        <div class="dropdown">
            <button class="btn btn-outline-secondary rounded-circle p-0" style="width:1.5rem;height:1.5rem;"
                type="button" id="commentSetting" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="commentSetting">
                <li>
                    <a class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalCommentEdit_{{ $comment->id }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                        コメント編集
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#modalCommentDelete_{{ $comment->id }}">
                        <i class="fa-solid fa-trash-can"></i>
                        コメント削除
                    </a>
                </li>
            </ul>
        </div>
        {{-- /コメント編集メニュー --}}

        {{-- 編集用モーダル --}}
        <div class="modal fade" id="modalCommentEdit_{{ $comment->id }}" tabindex="-1"
            aria-labelledby="modalCommentEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCommentEditLabel">編集</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('comments.update', ['comment' => $comment->id]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" name="text"
                                    placeholder="コメントを投稿してみよう">{{ $comment->text ?? old('text') }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-primary text-white">更新する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /編集用モーダル --}}

        {{-- 削除用モーダル --}}
        <div class="modal fade" id="modalCommentDelete_{{ $comment->id }}" tabindex="-1"
            aria-labelledby="modalCommentDeleteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCommentDeleteLabel">確認</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            コメントを削除します。よろしいですか？
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


<div class="card mb-4 border-0 position-relative shadow-sm">

    <div class="card-body position-relative">
        <a @class(['stretched-link' => $stretchedLink]) href="{{ route('posts.show', ['post' => $comment->post]) }}"></a>
        {{-- コメント内容 --}}
        <p class="card-text">
            {!! nl2br(e($comment->text)) !!}
        </p>
        {{-- /コメント内容 --}}
    </div>

    {{-- 吹き出し画像 --}}
    <svg width="4.5em" height="4.5em" viewBox="-16 -5 32 32"
        class="position-absolute top-0 start-0 translate-middle mt-1 bi bi-caret-up-fill" fill="#fff"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
    </svg>
    {{-- /吹き出し画像 --}}

</div>
{{-- /コメント --}}
