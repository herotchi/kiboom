
@if ($noindexFlg)
<meta name="robots" content="noindex">
@endif
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>@yield('title') | {{ config('app.name', 'kiboom') }}</title>
<meta name="description" content="毎日の気分を記録、観察するための日記投稿サイト">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">