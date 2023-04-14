<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\User\AddRequest;
use App\Http\Requests\User\EditRequest;

class UserController extends Controller
{
    public function add()
    {
        return view('users.add');
    }


    public function insert(AddRequest $request)
    {
        DB::transaction(function () use($request) {
            $userModel = new User();
            $userModel->insertUser($request->validated());
        });

        return redirect()->route('login')->with('msg_success', 'アカウントを作成しました。');
    }


    public function update(EditRequest $request)
    {
        DB::transaction(function () use($request) {
            $userModel = new User();
            $userModel->updateUser($request->validated());
        });

        return redirect()->route('top')->with('msg_success', 'ユーザー名を変更しました。');
    }
}
