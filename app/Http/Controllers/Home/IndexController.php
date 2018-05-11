<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Service\Post\PostService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(Request $request, PostService $postService)
    {
        $filter = $request->input('filter');
        $cid  = 'index';
        $list = $postService->getPostListWithFilterByCid($filter, $cid);
        $assign = compact('cid', 'list');
        return view('home.index.index', $assign);
    }

    public function category(Request $request, PostService $postService)
    {
        $filter = $request->input('filter');
        $cid = $request->input('cid');
        $list = $postService->getPostListWithFilterByCid($filter, $cid);
        $assign = compact('list');
        return view('home.index.index', $assign);
    }
}
