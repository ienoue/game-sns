@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- エラー表示 --}}
                @include('inc.error')
                {{-- /エラー表示 --}}

                {{-- 検索ワード --}}
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-white">
                        検索結果
                    </div>
                    <div class="card-body">
                        @if ($tag)
                            <h5 class="card-title fw-bold">{{ $tag->name }}</h5>
                            <p class="card-text">{{ $tag->posts->count() }}件</p>
                        @else
                            <h5 class="card-title fw-bold">タグが存在しませんでした</h5>
                            <p class="card-text">0件</p>
                        @endif
                    </div>
                </div>
                {{-- /検索ワード --}}

                {{-- 投稿内容一覧 --}}
                @if ($tag)
                    @foreach ($posts as $post)
                        @include('inc.post', [
                            'stretchedLink' => true,
                            'charLimit' => true,
                            'likeBtn' => $post->likeBtnStatus(),
                        ])
                    @endforeach
                @endif
                {{-- /投稿内容一覧 --}}

                {{-- ページネーション --}}
                @if ($tag)
                    {{ $posts->appends(['tag' => $tag->name])->links() }}
                @endif
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
