<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use DateTime;

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
