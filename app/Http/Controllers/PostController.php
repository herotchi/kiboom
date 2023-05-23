<?php

namespace App\Http\Controllers;

use App\Consts\PostConsts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Diary;

use App\Http\Requests\Post\AddRequest;
use App\Http\Requests\Post\EditRequest;

//use Illuminate\Support\Arr;

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
            $postModel->insertPost($request->validated());
        });

        return redirect()->route('top')->with('msg_success', '日記を投稿しました。');

    }


    public function detail($id)
    {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => [
                'bail',
                'required',
                'integer',
                // 自身が投稿した日記のみ
                Rule::exists('posts', 'id')->where(function ($query) {
                    return $query->where('user_id', Auth::user()->id);
                }),
            ]]
        );

        if ($validator->fails()) {
            return redirect()->route('top')->with('msg_failure', '不正な値が入力されました。');
        }

        $postModel = new Post();
        $detail = $postModel->getDetail($id);

        return view('posts.detail', compact('detail'));
    }



    public function edit($id)
    {
        $validator = Validator::make(
            ['id' => $id],
            ['id' => [
                'bail',
                'required',
                'integer',
                Rule::exists('posts', 'id')->where('user_id', Auth::user()->id),
            ]]
        );

        if ($validator->fails()) {
            return redirect()->route('top')->with('msg_failure', '不正な値が入力されました。');
        }

        $postModel = new Post();
        $detail = $postModel->getDetail($id);

        return view('posts.edit', compact('detail'));
    }


    public function update(EditRequest $request) 
    {
        DB::transaction(function () use($request) {
            $postModel = new Post();
            $postModel->updatePost($request->validated());
        });

        return redirect()->route('top')->with('msg_success', '日記を編集しました。');
    }
}
