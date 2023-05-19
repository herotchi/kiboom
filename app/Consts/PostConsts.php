<?php

namespace App\Consts;

class PostConsts
{
    // 今朝の気分
    public const POINT_RANGE_MIN = 0;
    public const POINT_RANGE_MAX = 100;

    // 今朝の天気
    public const WEATHER_SUN = 1;
    public const WEATHER_CLOUD = 2;
    public const WEATHER_RAIN = 3;
    public const WEATHER_SNOW = 4;
    public const WEATHER_LIST = [
        self::WEATHER_SUN => '晴',
        self::WEATHER_CLOUD => '曇',
        self::WEATHER_RAIN => '雨',
        self::WEATHER_SHOW => '雪',
    ];

    // 朝散歩の有無
    public const WALK_FLG_DONE = 1;
    public const WALK_FLG_NOT_YET = 2;
    public const WALK_FLG_LIST = [
        self::WALK_FLG_DONE => 'した',
        self::WALK_FLG_NOT_YET => 'してない',
    ];

    // 日記
    public const DIARY_LENGTH_MIN = 6;
    public const DIARY_LENGTH_MAX = 100; 

    // その他
    public const OTHERS_LENGTH_MAX = 400;

    // 1ページにおける最大投稿表示件数
    public const PAGENATE_LIMIT = 7;
}