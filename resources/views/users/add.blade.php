@extends('layouts.app')

@section('content')
<div class="form-add-user">
    <div class="py-3 text-center">
        <img class="mb-4" src="{{ asset('img/icon.png') }}" alt="" width="57" height="57">
        <h1 class="h3 mb-3 fw-normal">アカウント作成</h1>
    </div>
    <form method="POST" action="{{ route('users.insert') }}" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <input type="text" id="name" 
                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                    name="name" value="{{ old('name') }}" placeholder="ユーザー名" 
                    required autofocus>
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            </div>
            <div class="col-12">
                <input type="text" id="login_id" 
                    class="form-control{{ $errors->has('login_id') ? ' is-invalid' : '' }}"
                    name="login_id" value="{{ old('login_id') }}" placeholder="ログインID" required>
                <div class="invalid-feedback">{{ $errors->first('login_id') }}</div>
            </div>
            <div class="col-12">
                <input type="password" id="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                    name="password" placeholder="パスワード" required>
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            </div>
            <div class="col-12">
                <input type="password" id="password_confirmation"
                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                    name="password_confirmation" placeholder="パスワード確認" required>
                <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
            </div>
            <div class="col-7">
                <button class="btn btn-primary" type="submit">アカウント作成</button>
            </div>
            <div class="col-5 text-end">
                <a class="btn btn-secondary" href="" role="button">戻る</a>
            </div>
        </div>
    </form>

</div>
@endsection