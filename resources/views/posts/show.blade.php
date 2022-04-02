@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                {{-- 投稿内容 --}}
                @include('inc.post', [
                    'stretchedLink' => false,
                    'charLimit' => false,
                    'likeBtn' => $post->likeBtnState(),
                ])
                {{-- /投稿内容 --}}
            </div>
        </div>
    </div>
@endsection
