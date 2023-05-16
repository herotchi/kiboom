<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Consts\PostConsts;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $dates = [
        'calendar',
    ];

    protected $fillable = [
        'point',
        'weather',
        'walk_flg',
        'others',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }


    public function getTopList()
    {
        $query = $this::query();
        $query->where('user_id', Auth::user()->id);
        $query->orderBy('calendar', 'desc');
        $list = $query->with('user')->paginate(PostConsts::PAGENATE_LIMIT);

        return $list;
    }


    /**
     * 今日すでに日記を書いたかどうかのチェック
     * 
     * @return boolean $todayPostedFlg
     */
    public function getTodayPostedFlg()
    {
        $todayPostedFlg = false;
        $today = new DateTime();
        $query = $this::query();
        $query->where('user_id', Auth::user()->id);
        $query->where('calendar', $today->format('Y-m-d'));
        $count = $query->count();

        if($count > 0) {
            $todayPostedFlg = true;
        }
        
        return $todayPostedFlg;
    }

    /**
     * 日記を投稿し、投稿した日記のIDを取得する
     * 
     * @param array $data
     * @return int $this->id
     * 
     */
    public function insertPost(array $data)
    {
        $today = new Datetime();
        $this->user_id = Auth::user()->id;
        $this->calendar = $today->format('Y-m-d');
        $this->fill($data);
        $this->save();

        return $this->id;
    }
}
