@extends('layouts.app')

@section('javascript')
    @include('inc.transform')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- 検索ワード --}}
                <div class="card mb-4">
                    <div class="card-header">
                        検索結果
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $tag->name }}</h5>
                        <p class="card-text">{{ $tag->posts->count() }}件</p>
                    </div>
                </div>
                {{-- /検索ワード --}}

                {{-- 投稿内容一覧 --}}
                @foreach ($tag->posts as $post)
                    @include('posts.post', ['stretchedLink' => true, 'charLimit' => true])
                @endforeach
                {{-- /投稿内容一覧 --}}

            </div>
        </div>
    </div>
@endsection
