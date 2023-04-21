@extends('layouts.app')

@section('content')

<<<<<<< Updated upstream
=======
<div class="row justify-content-center g-3">
    <div class="col">
        <div class="card">
            <div class="card-header">最近のセッション</div>
            <div class="card-body">
                <div class="list-group">
                @foreach($posts as $post)
                {{ $post->user_id }}
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


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




>>>>>>> Stashed changes
<!-- ユーザー名変更モーダルの設定 -->
@include('users.edit')

<!-- ログイン情報変更モーダルの設定 -->
@include('users.login')


@endsection
