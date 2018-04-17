<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Sodium\compare;

class IndexController extends Controller
{
    //
    public function index()
    {
        $cid = 'index';
        $assign = compact('cid');
        return view('home.index.index', $assign);
    }

    public function category(Request $request)
    {
        return view('home.index.index');
    }
}
