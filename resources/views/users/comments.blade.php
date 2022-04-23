@extends('layouts.app')

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
                    'postsPage' => false,
                    'likesPage' => false,
                    'commentsPage' => true,
                    'battlesPage' => false,
                    'monstersPage' => false,
                ])
                {{-- /タブ --}}

                {{-- いいねした投稿内容一覧 --}}
                @foreach ($comments as $comment)
                    @include('inc.comment', [
                        'stretchedLink' => true,
                    ])
                @endforeach
                {{-- /いいねした投稿内容一覧 --}}

                {{-- ページネーション --}}
                {{ $comments->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
