@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                {!! nl2br(e( $post->text )) !!}
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
