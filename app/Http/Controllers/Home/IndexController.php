<?php

namespace App\Http\Controllers\Home;

use App\Service\Post\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request, PostService $postService)
    {
        $filter = $request->input('filter');
        $cid  = 'index';
        $list = $postService->getPostListWithFilter($filter);
        $assign = compact('cid', 'list');
        return view('home.index.index', $assign);
    }

    public function category(Request $request)
    {
        return view('home.index.index');
    }
}
