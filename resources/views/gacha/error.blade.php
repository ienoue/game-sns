{{-- ガチャ終了ページ --}}
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card shadow-sm">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold">本日のガチャは終了しました</h5>
                        <p class="card-text">また明日お越しください。</p>
                        <i class="fa-solid fa-bed fa-6x mb-5"></i>
                        <a role="button" class="btn btn-primary flex-fill" href="{{ route('posts.index') }}">
                            ホーム
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
