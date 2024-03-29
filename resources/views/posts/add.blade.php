@extends('layouts.app')
@section('title', '日記投稿')
@section('content')
<div class="row justify-content-center g-3">
    <div class="col">
        <div class="card">
            <form method="POST" action="{{ route('posts.insert') }}" novalidate>
                @csrf
                <div class="card-header"><h4 class="my-2">日記投稿</h4></div>
                <div class="card-body">
                    <div class="row g-3">
                        <label for="point" class="form-label">今朝の気分
                            <span class="text-danger font-weight-bold">※</span>
                            <span class="font-weight-bold" id="point_value"></span>
                        </label>
                        <input type="range" class="form-range mt-0" name="point" min="0" max="100" step="5" id="point" value="{{ old('point') }}">
                        <div class="mt-0{{ $errors->has('point') ? ' is-invalid' : '' }}"></div>
                        <div class="invalid-feedback">{{ $errors->first('point') }}</div>

                        <label class="form-label">今朝の天気
                            <span class="text-danger font-weight-bold">※</span>
                        </label>
                        <div class="btn-group mt-0">
                            @foreach(PostConsts::WEATHER_LIST as $key => $value)
                                <input type="radio" class="btn-check" name="weather" id="weather_{{ $key }}"
                                    value="{{ $key }}" autocomplete="off" @if(old('weather')==$key) checked @endif>
                                <label class="btn btn-outline-success form-control{{ $errors->has('weather') ? ' is-invalid' : '' }}"
                                    for="weather_{{ $key }}">
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-0{{ $errors->has('weather') ? ' is-invalid' : '' }}"></div>
                        <div class="invalid-feedback">{{ $errors->first('weather') }}</div>

                        <label class="form-label">朝散歩
                            <span class="text-danger font-weight-bold">※</span>
                        </label>
                        <div class="btn-group mt-0">
                            @foreach(PostConsts::WALK_FLG_LIST as $key => $value)
                                <input type="radio" class="btn-check" name="walk_flg" id="walk_flg_{{ $key }}"
                                    value="{{ $key }}" autocomplete="off" @if(old('walk_flg')==$key) checked @endif>
                                <label class="btn btn-outline-success form-control{{ $errors->has('walk_flg') ? ' is-invalid' : '' }}"
                                    for="walk_flg_{{ $key }}">
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        <div class="mt-0{{ $errors->has('walk_flg') ? ' is-invalid' : '' }}"></div>
                        <div class="invalid-feedback">{{ $errors->first('walk_flg') }}</div>

                        <div class="col-md-12">
                            <label for="diary_1" class="form-label">日記
                                <span class="text-danger font-weight-bold">※</span>
                            </label>
                            <input type="text" id="diary_1" 
                                class="form-control{{ $errors->has('diary_1') ? ' is-invalid' : '' }}" 
                                name="diary_1" value="{{ old('diary_1') }}" placeholder="今日の出来事" 
                                required>
                            <div class="invalid-feedback">{{ $errors->first('diary_1') }}</div>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="diary_2" 
                                class="form-control{{ $errors->has('diary_2') ? ' is-invalid' : '' }}" 
                                name="diary_2" value="{{ old('diary_2') }}" placeholder="今日の出来事">
                            <div class="invalid-feedback">{{ $errors->first('diary_2') }}</div>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="diary_3" 
                                class="form-control{{ $errors->has('diary_3') ? ' is-invalid' : '' }}" 
                                name="diary_3" value="{{ old('diary_3') }}" placeholder="今日の出来事">
                            <div class="invalid-feedback">{{ $errors->first('diary_3') }}</div>
                        </div>
                        <div class="col-md-12">
                            <label for="others" class="form-label">その他</label>
                            <textarea id="others"
                                class="form-control{{ $errors->has('others') ? ' is-invalid' : '' }}" 
                                name="others" rows="3">{{ old('others') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('others') }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="text-center my-3">
                        <button class="btn btn-primary w-50" type="submit">投稿する</button>
                        <a class="btn btn-secondary" href="{{ route('top') }}" role="button">戻る</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // 今朝の気分の点数を表示する
    var inputElement = document.getElementById('point');
    var pointText = document.getElementById('point_value');
    var getRangeValue = function (inputElement, pointText) {
        return function() {
            pointText.innerHTML = inputElement.value + "点";
            console.log(inputElement.value);
        }
    }
    inputElement.addEventListener('input', getRangeValue(inputElement, pointText));
    window.addEventListener('load', getRangeValue(inputElement, pointText));
</script>
@endsection
