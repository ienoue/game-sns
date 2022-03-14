@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('post.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" rows="2" name="text" placeholder="好きな話題を投稿してみよう"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">投稿する</button>
                            </form>
                        </div>
                    </div>
                @endauth
                @foreach ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="fw-bold pe-2">
                                    {{ $post->user->name }}
                                </div>
                                <div class="fw-light text-muted">
                                    {{ $post->created_at }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {!! nl2br(e($post->text)) !!}
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            いいね
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
