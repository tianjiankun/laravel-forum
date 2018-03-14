<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, Post $postModel)
    {
        $arr = $request->all();
        $list = $postModel->getPostList($arr);
        $assign = compact('list');
        return view('admin.post.list', $assign);
    }
}
