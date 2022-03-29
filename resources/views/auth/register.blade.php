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
                        <h3 class="card-title text-center mb-5">新規登録</h3>
                        <form class="card-text" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="name">
                                    <label for="name">
                                        @error('name')
                                            {{ $message }}
                                        @else
                                            {{ __('Name') }}
                                        @enderror
                                    </label>
                                </div>

                            </div>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="email">
                                    <label for="email">
                                        @error('email')
                                            {{ $message }}
                                        @else
                                            {{ __('Email Address') }}
                                        @enderror
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="password">
                                    <label for="password">
                                        @error('password')
                                            {{ $message }}
                                        @else
                                            {{ __('Password') }}
                                        @enderror
                                    </label>
                                </div>
                            </div>

                            <div class="mb-5">
                                <div class="form-floating">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="password-confirm">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
