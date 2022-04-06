@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="card-title fw-bold mb-5">本日のガチャは終了しました。</h4>
                        <a role="button" class="btn btn-primary text-white flex-fill" href="{{ route('posts.index') }}">
                            ホーム
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
