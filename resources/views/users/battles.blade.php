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
                    'battlesPage' => true,
                    'monstersPage' => false,
                    'followeePage' => false,
                    'followerPage' => false,
                ]) {{-- /タブ --}}

                {{-- 対戦履歴一覧 --}}
                @foreach ($battles as $battle)
                    @include('inc.battleListItem')
                @endforeach
                {{-- /対戦履歴一覧 --}}

                {{-- ページネーション --}}
                {{ $battles->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
