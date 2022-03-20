@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- 投稿フォーム --}}
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('inc.error')
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" rows="2" name="text" placeholder="好きな話題を投稿してみよう">{{ old('text') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">投稿する</button>
                            </form>
                        </div>
                    </div>
                @endauth
                {{-- /投稿フォーム --}}

                {{-- 投稿内容一覧 --}}
                @foreach ($posts as $post)
                    @include('posts.post', ['useStretchedLink' => true])
                @endforeach
                {{-- /投稿内容一覧 --}}

            </div>
        </div>
    </div>
@endsection
