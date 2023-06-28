<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- metaタグ -->
        @include('layouts.meta', ['noindexFlg' => false])

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/kiboom.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('img/kiboom.png') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <!-- Custom styles -->
        @stack('no_header')
        @stack('top')

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>

    </head>
    <body>
        @include('layouts.navbar')
        <div class="container @if (Auth::check())my-3 @endif">
            <main>
                @yield('content')
            </main>
            @if (Auth::check())
            @include('layouts.footer')
            <!-- ユーザー名変更モーダルの設定 -->
            @include('users.edit')
            <!-- ログイン情報変更モーダルの設定 -->
            @include('users.login')
            @endif
        </div>
        @include('layouts.flash')
    </body>
</html>
