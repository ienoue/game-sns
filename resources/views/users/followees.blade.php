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
                    'battlesPage' => false,
                    'monstersPage' => false,
                    'followeePage' => true,
                    'followerPage' => false,
                ]) {{-- /タブ --}}

                {{-- フォロワー一覧 --}}
                <ul class="list-group mb-3">
                    @foreach ($followees as $usr)
                        @include('inc.followListItem', [
                            'followBtn' => $usr->followBtnStatus(),
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
