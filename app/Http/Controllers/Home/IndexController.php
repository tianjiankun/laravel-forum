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
        $uri = $request->url();
        $cid  = 'index';
        $list = $postService->getPostListWithFilterByCid($filter, $cid);
        $assign = compact('cid', 'list', 'uri');
        return view('home.index.index', $assign);
    }

    public function category($cid, Request $request, PostService $postService)
    {
        $filter = $request->input('filter');
        $uri = $request->url();
        $list = $postService->getPostListWithFilterByCid($filter, $cid);
        $assign = compact('cid', 'list', 'uri');
        return view('home.index.index', $assign);
    }
}
