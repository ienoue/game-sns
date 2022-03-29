@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <img class="d-block mx-auto" src="/images/logo.png" alt="" width="168" height="60">
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3 class="card-title text-center mb-3">@yield('title')</h3>
                                @yield('form')
                            </li>
                            <li class="list-group-item">
                                <div class="text-center mt-2">
                                    @yield('link')
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection