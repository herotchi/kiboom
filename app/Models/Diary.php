<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Diary extends Model
{
    use HasFactory;

    protected $table = 'diaries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'post_id',
        'content',
        'sort',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


    /**
     * 日記を登録する
     * 
     * @param array $data
     * @param int $postId
     */
    public function insertDiary(array $data, int $postId)
    {
        $this->post_id = $postId;
        $this->content = $data['diary_1'];
        $this->sort = 1;
        $this->save();

        if (strlen($data['diary_2']) > 0) {
            $newPost = new self;
            $newPost->post_id = $postId;
            $newPost->content = $data['diary_2'];
            $newPost->sort = 2;
            $newPost->save();
        }

        if (strlen($data['diary_3']) > 0) {
            $newPost = new self;
            $newPost->post_id = $postId;
            $newPost->content = $data['diary_3'];
            $newPost->sort = 3;
            $newPost->save();
        }
    }
}
