@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- エラー表示 --}}
                @include('inc.error')
                {{-- /エラー表示 --}}

                {{-- 投稿内容 --}}
                @include('inc.post', [
                    'stretchedLink' => false,
                    'charLimit' => false,
                    'likeBtn' => $post->likeBtnStatus(),
                ])
                {{-- /投稿内容 --}}

                <form class="d-flex mb-4" method="POST" action="{{ route('posts.comments.store', ['post' => $post->id]) }}">
                    @csrf
                    <div class="flex-grow-1 me-3">
                        <textarea class="form-control" rows="1" name="text" placeholder="コメント">{{ old('text') }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-primary">返信する</button>
                    </div>
                </form>

                <div class="mb-4 px-3 mb-1">
                    <i class="fa-solid fa-comments fa-fw"></i>
                    コメント
                    <span class="mx-1 fw-bold">{{ $post->comments->count() }}</span>
                    件
                </div>

                @foreach ($comments as $comment)
                    {{-- コメント --}}
                    @include('inc.comment', [
                        'stretchedLink' => false,
                    ])
                    {{-- /コメント --}}
                @endforeach

                {{-- ページネーション --}}
                {{ $comments->links() }}
                {{-- /ページネーション --}}
            </div>
        </div>
    </div>
@endsection
