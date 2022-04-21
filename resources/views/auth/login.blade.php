@extends('layouts.auth')

@section('title', 'ログイン')

@section('form')
    <form class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <div class="form-floating">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" placeholder="email">
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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="password">
                <label for="password">
                    @error('password')
                        {{ $message }}
                    @else
                        {{ __('Password') }}
                    @enderror
                </label>
            </div>
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
                <button type="submit" class="btn btn-primary btn-lg text-white">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('link')
    <a class="text-decoration-none" href="{{ route('register') }}">新規登録はこちら</a>
@endsection
