@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- ユーザ情報 --}}
                @include('inc.userInfo')
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

            </div>
        </div>
    </div>
@endsection
