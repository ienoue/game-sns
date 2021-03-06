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

                {{-- ユーザ情報 --}}
                @include('inc.userInfo', [
                    'followBtn' => $user->followBtnStatus(),
                ])
                {{-- /ユーザ情報 --}}

                {{-- タブ --}}
                @include('inc.tabs', [
                    'postsPage' => true,
                    'likesPage' => false,
                    'commentsPage' => false,
                    'battlesPage' => false,
                    'monstersPage' => false,
                ])
                {{-- /タブ --}}

                {{-- 投稿内容一覧 --}}
                @foreach ($posts as $post)
                    @include('inc.post', [
                        'stretchedLink' => true,
                        'charLimit' => true,
                        'likeBtn' => $post->likeBtnStatus(),
                    ])
                @endforeach
                {{-- /投稿内容一覧 --}}

                {{-- ページネーション --}}
                {{ $posts->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
