<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <!-- Custom styles -->

        <!-- Scripts -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    </head>
    <body>
        <div class="container my-3">
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>