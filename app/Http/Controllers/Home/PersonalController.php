<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //用户个人中心
    public function personal()
    {
        return view('home.personal.index');
    }
}
