@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- ユーザ情報 --}}
                @include('inc.userInfo', [
                    'buttonState' => $user->buttonState(),
                ])
                {{-- /ユーザ情報 --}}

                {{-- タブ --}}
                @include('inc.tabs', [
                    'postsPage' => false,
                    'likesPage' => false,
                    'battlesPage' => false,
                    'monstersPage' => false,
                    'followeePage' => true,
                    'followerPage' => false,
                ]) {{-- /タブ --}}

                {{-- フォロワー一覧 --}}
                @foreach ($followees as $usr)
                    @include('inc.userFollow', [
                        'buttonState' => $usr->buttonState(),
                    ])
                @endforeach
                {{-- /フォロワー一覧 --}}

            </div>
        </div>
    </div>
@endsection