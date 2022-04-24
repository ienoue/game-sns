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

                {{-- フォロータブ --}}
                @include('inc.followTabs', [
                    'followeePage' => false,
                    'followerPage' => true,
                ])
                {{-- /フォロータブ --}}

                {{-- フォロワー一覧 --}}
                @foreach ($followers as $usr)
                    @include('inc.followListItem', [
                        'followBtn' => $usr->followBtnStatus(),
                    ])
                @endforeach
                {{-- /フォロワー一覧 --}}

                {{-- ページネーション --}}
                {{ $followers->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
