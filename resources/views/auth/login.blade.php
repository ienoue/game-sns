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
                        <h3 class="card-title text-center mb-5">ログイン</h3>
                        <form class="card-text" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="email">
                                    <label for="email">{{ __('Email Address') }}</label>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-floating">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="password">
                                    <label for="password">{{ __('Password') }}</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
