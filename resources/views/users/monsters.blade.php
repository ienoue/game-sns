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
                    'commentsPage' => false,
                    'battlesPage' => false,
                    'monstersPage' => true,
                ]) {{-- /タブ --}}

                {{-- モンスター一覧 --}}
                <div class="table-responsive">
                    <table class="table bg-white align-middle text-nowrap text-center table_border_radius shadow-sm">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"><a
                                        href="{{ route('users.monsters', ['user' => $user->name, 'sort' => 'name']) }}">名前</a>
                                </th>
                                <th scope="col"><a
                                        href="{{ route('users.monsters', ['user' => $user->name, 'sort' => 'rarity']) }}">レア</a>
                                </th>
                                <th scope="col"><a
                                        href="{{ route('users.monsters', ['user' => $user->name, 'sort' => 'attack']) }}">攻撃力</a>
                                </th>
                                <th scope="col"><a
                                        href="{{ route('users.monsters', ['user' => $user->name, 'sort' => 'updated']) }}">取得日</a>
                                </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monsters as $monster)
                                @include('inc.monsterListItem', [
                                    'partnerBtn' => $user->partnerBtnStatus($monster),
                                ])
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- /モンスター一覧 --}}

                {{-- ページネーション --}}
                {{ $monsters->appends(['sort' => $sort])->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
