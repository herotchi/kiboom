<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Post;

class TopController extends Controller
{
    public function top()
    {
        $postModel = new Post();
        $posts = $postModel->getTopList();
        $todayPostedFlg = $postModel->getTodayPostedFlg();

        return view('top', compact('posts', 'todayPostedFlg'));
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }
}
