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
                    'followeePage' => false,
                    'followerPage' => true,
                ]) {{-- /タブ --}}

                {{-- フォロワー一覧 --}}
                <ul class="list-group">
                    @foreach ($followers as $usr)
                        @include('inc.userFollow', [
                            'buttonState' => $usr->buttonState(),
                        ])
                    @endforeach
                </ul>
                {{-- /フォロワー一覧 --}}

            </div>
        </div>
    </div>
@endsection
