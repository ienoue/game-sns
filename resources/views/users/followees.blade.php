@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                {{-- ユーザ情報 --}}
                @include('inc.userInfo', [
                    'followBtn' => $user->followBtnState(),
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
                <ul class="list-group mb-3">
                    @foreach ($followees as $usr)
                        @include('inc.userFollow', [
                            'followBtn' => $usr->followBtnState(),
                        ])
                    @endforeach
                </ul>
                {{-- /フォロワー一覧 --}}

                {{-- ページネーション --}}
                {{ $followees->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
