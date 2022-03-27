@extends('layouts.app')

@section('javascript')
    @include('inc.transform')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- ユーザ情報 --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            @if (Auth::check() && Auth::id() !== $user->id)
                                <button type="button" class="btn btn-follow {{ $followBtnVisual }}"
                                    data-user-name="{{ $user->name }}">
                                    <i class="fa-solid {{ $followIcon }}"></i>
                                    <span>{{ $followBtnText }}</span>
                                </button>
                            @endif
                        </div>
                        <p class="card-text">{{ $user->introduction }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">フォロー {{ $user->followees->count() }}</li>
                        <li class="list-group-item">フォロワー {{ $user->followers->count() }}</li>
                        <li class="list-group-item">相棒モンスター test</li>
                        <li class="list-group-item">バトル回数 1,324</li>
                        <li class="list-group-item">勝率 53%</li>
                    </ul>
                </div>
                {{-- /ユーザ情報 --}}

                {{-- 投稿内容一覧 --}}
                @foreach ($posts as $post)
                    @include('posts.post', ['stretchedLink' => true, 'charLimit' => true])
                @endforeach
                {{-- /投稿内容一覧 --}}

            </div>
        </div>
    </div>
@endsection
