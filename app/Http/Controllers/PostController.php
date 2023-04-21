<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Diary;

use App\Http\Requests\Post\AddRequest;

use Illuminate\Support\Arr;

class PostController extends Controller
{
    //
    public function add()
    {
        return view('posts.add');
    }


    public function insert(AddRequest $request) 
    {
        DB::transaction(function () use($request) {
            $postModel = new Post();
            $postId = $postModel->insertPost($request->validated());

            $diaryModel = new Diary();
            $diaryModel->insertDiary($request->validated(), $postId);
        });

        return redirect()->route('top')->with('msg_success', '日記を投稿しました。');

    }
}
