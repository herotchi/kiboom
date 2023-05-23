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
        'diary_1',
        'diary_2',
        'diary_3',
        'others',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
     * 
     */
    public function insertPost(array $data)
    {
        $today = new Datetime();
        $this->user_id = Auth::user()->id;
        $this->calendar = $today->format('Y-m-d');
        $this->fill($data);
        $this->save();
    }


    public function getDetail($id)
    {
        $query = $this::query();
        $query->where('id', $id);
        $query->where('user_id', Auth::user()->id);
        $detail = $query->first();

        return $detail;
    }


    public function updatePost(array $data)
    {
        $post = $this::find($data['id']);
        $post->fill($data)->save();
    }
}
