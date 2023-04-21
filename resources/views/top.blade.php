@extends('layouts.app')

@section('content')

<div class="position-relative">
    {{--<button type="button" id="postsAddBtn" class="btn btn-primary rounded-circle p-0 position-absolute bottom-0 end-0" 
        data-bs-toggle="modal" data-bs-target="#postsAdd"
        style="width:3rem;height:3rem;">
        ＋
    </button>--}}
    <a class="btn btn-primary rounded-circle p-0 position-absolute bottom-0 end-0" 
        style="width:3rem;height:3rem;" 
        href="{{ route('posts.add') }}" role="button">
        ＋
    </a>
</div>

<!-- ユーザー名変更モーダルの設定 -->
@include('users.edit')

<!-- ログイン情報変更モーダルの設定 -->
@include('users.login')



@endsection
