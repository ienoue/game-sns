@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- 投稿内容 --}}
                @include('posts.post', ['useStretchedLink' => false])
                {{-- /投稿内容 --}}
            </div>
        </div>
    </div>
@endsection
