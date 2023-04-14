@extends('layouts.app')

@section('content')

<!-- ユーザー名変更モーダルの設定 -->
@include('users.edit')

<!-- ログイン情報変更モーダルの設定 -->
@include('users.login')


@endsection
