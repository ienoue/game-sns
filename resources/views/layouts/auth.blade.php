@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- ブランドロゴ --}}
        <div class="mb-4">
            <img class="d-block mx-auto" src="/images/logo.png" alt="ロゴ" width="168" height="60">
        </div>
        {{-- /ブランドロゴ --}}

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">

                            {{-- 入力フォーム --}}
                            <li class="list-group-item">
                                <h3 class="card-title text-center mb-3">@yield('title')</h3>
                                @yield('form')
                            </li>
                            {{-- /入力フォーム --}}

                            {{-- 別ページへのリンク --}}
                            <li class="list-group-item">
                                <div class="text-center mt-2">
                                    @yield('link')
                                </div>
                            </li>
                            {{-- /別ページへのリンク --}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
