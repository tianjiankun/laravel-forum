<?php


namespace App\Http\Controllers\Home;


use App\Models\Post;

class PostController
{
    public function show($id)
    {
        $data = Post::with('content')
            ->find($id);
        $assign = compact('data');
        return view('home.post.show', $assign);
    }
}