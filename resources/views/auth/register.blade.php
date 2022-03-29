@extends('layouts.auth')

@section('title', '新規登録')

@section('form')
    <form class="card-text mb-3" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <div class="form-floating">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" placeholder="name">
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
                    name="password" required autocomplete="new-password" placeholder="password">
                <label for="password">
                    @error('password')
                        {{ $message }}
                    @else
                        {{ __('Password') }}
                    @enderror
                </label>
            </div>
        </div>

        <div class="mb-4">
            <div class="form-floating">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="password-confirm">
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
@endsection

@section('link')
    <a class="text-decoration-none" href="{{ route('login') }}">ログインはこちら</a>
@endsection
