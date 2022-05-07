<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @yield('javascript')
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                {{-- タイトルロゴ --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="ロゴ" width="84" height="30">
                </a>
                {{-- /タイトルロゴ --}}

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- ナビバーの右部分 -->
                    <ul class="navbar-nav ms-auto">

                        @guest
                            <!-- 認証 -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.guest') }}">
                                    <i class="fa-solid fa-user-check fa-fw"></i>
                                    ゲストログイン
                                </a>
                            </li>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa-solid fa-right-to-bracket fa-fw"></i>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus fa-fw"></i>
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                            {{-- /認証 --}}
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('gacha.index', ['user' => Auth::user()->name]) }}">
                                    <i class="fa-solid fa-gem fa-fw"></i>
                                    ガチャ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('users.index', ['user' => Auth::user()->name]) }}">
                                    <i class="fa-solid fa-user fa-fw"></i>
                                    マイページ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket fa-fw"></i>
                                    {{ __('Logout') }}
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest

                    </ul>
                    <!-- /ナビバーの右部分 -->

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- ページ上部に戻るボタン --}}
    <div id="scrollTop" style="display: none; z-index: 1020;" class="position-fixed bottom-0 end-0 mb-4 me-4">
        <a role="button" class="btn btn-secondary rounded-circle opacity-50 position-relative"
            style="width:3.5rem;height:3.5rem;">
            <span class="text-white position-absolute top-50 start-50 translate-middle text-nowrap">
                <i class="fa-solid fa-angle-up fa-3x"></i>
            </span>
        </a>
    </div>
    {{-- /ページ上部に戻るボタン --}}
</body>

</html>
