@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- 投稿内容 --}}
                @include('inc.post', ['stretchedLink' => false, 'charLimit' => false])
                {{-- /投稿内容 --}}
            </div>
        </div>
    </div>
@endsection
