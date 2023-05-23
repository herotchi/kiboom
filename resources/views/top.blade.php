@extends('layouts.app')

@push('top')
<style>
#postAdd{
    width: 75px;
    height: 75px;
    position: fixed;
    right: 20px;
    bottom: 20px;
    background: #0099FF;
    opacity: 0.6;
    border-radius: 50%;
    z-index: 1070;
}
#postAdd img{
    position: relative;
    display: block;
    width: 50px;
    height: 50px;
    top: 12.5px;
    left: 12.5px;
    color: #FFFFFF;
    text-decoration: none;
}
#postAdd img::before{
    color: #fff;
    position: absolute;
    width: 25px;
    height: 25px;
    top: -5px;
    bottom: 0;
    right: 0;
    left: 0;
    margin: auto;
    text-align: center;
}
img.weather {
    width:24px;
    height:24px;
}
img.walk_flg {
    width:24px;
    height:24px;
}
</style>
@endpush

@section('content')

<div class="row justify-content-center g-3">
    <div class="col">
        <div class="card">
            <div class="card-header py-3">{{ $posts->links('vendor.pagination.bootstrap-4-number') }}</div>
            <div class="card-body">
                <div class="list-group">
                    @foreach($posts as $post)
                    <a href="{{ route('posts.detail', ['id' => $post->id]) }}" class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-2 small position-relative bg-gradient rounded-circle position-relative 
                                @if($post->point >= 90)
                                    bg-danger
                                @elseif ($post->point < 90 && 75 <= $post->point)
                                    bg-warning
                                @elseif ($post->point < 75 && 65 <= $post->point)
                                    bg-success
                                @elseif ($post->point < 65 && 35 <= $post->point)
                                    bg-info
                                @elseif ($post->point < 35 && 25 <= $post->point)
                                    bg-primary
                                @elseif ($post->point < 25 && 10 <= $post->point)
                                    bg-secondary
                                @elseif ($post->point < 10)
                                    bg-dark
                                @endif" 
                                style="width:3rem;height:3rem;">
                                <span class="position-absolute top-50 start-50 translate-middle text-nowrap"><strong class="text-light">{{ $post->point }}</strong></span>
                            </div>
                            <div class="col-10">
                                <p class="mb-1">
                                    <span>
                                        @if ($post->weather === PostConsts::WEATHER_SUN)
                                        <img src="{{ asset('svg/sun.svg')}}" class="weather">
                                        @elseif ($post->weather === PostConsts::WEATHER_CLOUD)
                                        <img src="{{ asset('svg/cloud.svg')}}" class="weather">
                                        @elseif ($post->weather === PostConsts::WEATHER_RAIN)
                                        <img src="{{ asset('svg/umbrella.svg')}}" class="weather">
                                        @else
                                        <img src="{{ asset('svg/snow.svg')}}" class="weather">
                                        @endif
                                    </span>
                                    @if ($post->walk_flg === PostConsts::WALK_FLG_DONE)
                                    <span>
                                        <img src="{{ asset('svg/walk.svg')}}" class="walk_flg">
                                    </span>
                                    @endif
                                    <span class="float-end">{{ $post->calendar->format('Y/m/d') }}</span>
                                </p>
                                <p class="mb-1">・{{ $post->diary_1 }}</p>
                                @if (strlen($post->diary_2) > 0) 
                                <p class="mb-1">・{{ $post->diary_2 }}</p>
                                @endif
                                @if (strlen($post->diary_3) > 0) 
                                <p class="mb-1">・{{ $post->diary_3 }}</p>
                                @endif
                                @if (strlen($post->others) > 0) 
                                <p>{{ $post->others }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>


@if(!$todayPostedFlg)
<div id="postAdd">
    <a href="{{ route('posts.add') }}"><img src="{{ asset('svg/plus-lg.svg')}}"></a>
</div>
@endif






<!-- ユーザー名変更モーダルの設定 -->
@include('users.edit')

<!-- ログイン情報変更モーダルの設定 -->
@include('users.login')



@endsection
