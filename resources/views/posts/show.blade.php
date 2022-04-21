@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- 投稿内容 --}}
                @include('inc.post', [
                    'stretchedLink' => false,
                    'charLimit' => false,
                    'likeBtn' => $post->likeBtnStatus(),
                ])
                {{-- /投稿内容 --}}


                @foreach ($post->comments as $comment)
                    {{-- コメント --}}
                    @include('inc.comment')
                    {{-- /コメント --}}
                @endforeach
            </div>
        </div>
    </div>
@endsection
