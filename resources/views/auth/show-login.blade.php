@extends('layouts.app')
@section('title', __('ログイン'))
@push('no_header')
<link href="{{ asset('css/no_header.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="no-header">
    <div class="text-center">
        <img class="mb-4" src="{{ asset('img/kiboom.png') }}" alt="" width="57" height="57">
        <h1 class="h3 mb-3 fw-normal">ログイン</h1>
    </div>
    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-12">
               <input type="text" id="login_id" 
                    class="form-control{{ $errors->has('login_id') ? ' is-invalid' : '' }}" 
                    name="login_id" value="{{ old('login_id') }}" 
                    placeholder="ログインID" required autofocus>
                <div class="invalid-feedback">{{ $errors->first('login_id') }}</div>
            </div>
            <div class="col-12">
                <input type="password" id="password" 
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                name="password" placeholder="パスワード" required>
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            </div>

            <div class="col-5">
                <button class="btn btn-primary" type="submit">ログイン</button>
            </div>
            <div class="col-7 text-end">
                <a class="btn btn-success" href="{{ route('users.add') }}" role="button">アカウント作成</a>
            </div>
        </div>
    </form>
</div>

@endsection