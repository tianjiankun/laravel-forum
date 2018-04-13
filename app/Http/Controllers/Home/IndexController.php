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
        $a = 123;
        $assign = compact('a');
        return view('home.index.index', $assign);
    }
}
