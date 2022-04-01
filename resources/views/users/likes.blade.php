@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                {{-- ユーザ情報 --}}
                @include('inc.userInfo', [
                    'buttonState' => $user->buttonState(),
                ])
                {{-- /ユーザ情報 --}}

                {{-- タブ --}}
                @include('inc.tabs', [
                    'postsPage' => false,
                    'likesPage' => true,
                    'battlesPage' => false,
                    'monstersPage' => false,
                    'followeePage' => false,
                    'followerPage' => false,
                ])
                {{-- /タブ --}}

                {{-- いいねした投稿内容一覧 --}}
                @foreach ($posts as $post)
                    @include('inc.post', ['stretchedLink' => true, 'charLimit' => true])
                @endforeach
                {{-- /いいねした投稿内容一覧 --}}

                {{-- ページネーション --}}
                {{ $posts->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
