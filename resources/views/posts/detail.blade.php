@extends('layouts.app')

@section('title', '日記詳細')

@section('content')
<div class="row justify-content-center g-3">
    <div class="col">
        <div class="card">
            <div class="card-header"><h4 class="my-2">{{ $detail->calendar->format('Y年m月d日') }}投稿の詳細</h4></div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h5>今朝の気分</h5>
                        <span>{{ $detail->point }}点</span>
                    </li>
                    <li class="list-group-item">
                        <h5>今朝の天気</h5>
                        <span>{{ PostConsts::WEATHER_LIST[$detail->weather] }}</span>
                    </li>
                    <li class="list-group-item">
                        <h5>朝散歩の有無</h5>
                        <span>{{ PostConsts::WALK_FLG_LIST[$detail->walk_flg] }}</span>
                    </li>
                    <li class="list-group-item">
                        <h5>日記</h5>
                        <p>・{{ $detail->diary_1 }}</p>
                        @if (strlen($detail->diary_2) > 0)
                        <p>・{{ $detail->diary_2 }}</p>
                        @endif
                        @if (strlen($detail->diary_3) > 0)
                        <p>・{{ $detail->diary_3 }}</p>
                        @endif
                    </li>
                    <li class="list-group-item">
                        <h5>その他</h5>
                        <p>{!! nl2br(e($detail->others)) !!}</p>
                    </li>
                </ul>
            </div>
            
            <div class="card-footer">
                <div class="col-12 text-center my-2">
                    <a class="btn btn-primary w-50" href="{{ route('posts.edit', ['id' => $detail->id]) }}"
                        role="button">編集する
                    </a>
                    <a class="btn btn-secondary" href="{{ route('top') }}" role="button">戻る</a>
                    {{--<button type="button" class="btn btn-outline-danger ms-sm-5" data-bs-toggle="modal"
                        data-bs-target="#deleteModal">削除する
                    </button>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection