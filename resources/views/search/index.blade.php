@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                {{-- 検索ワード --}}
                <div class="card mb-4">
                    <div class="card-header">
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
                    @foreach ($tag->posts as $post)
                        @include('inc.post', ['stretchedLink' => true, 'charLimit' => true])
                    @endforeach
                @endif
                {{-- /投稿内容一覧 --}}

            </div>
        </div>
    </div>
@endsection
