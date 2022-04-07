@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

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
                    'monstersPage' => true,
                    'followeePage' => false,
                    'followerPage' => false,
                ]) {{-- /タブ --}}

                {{-- モンスター一覧 --}}
                <ul class="list-group mb-3">
                    @foreach ($monsters as $monster)
                        @include('inc.monsterListItem', [
                            'partnerBtn' => $user->partnerBtnStatus($monster),
                        ])
                    @endforeach
                </ul>
                {{-- /モンスター一覧 --}}

                {{-- ページネーション --}}
                {{ $monsters->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
