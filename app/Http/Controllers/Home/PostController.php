<?php


namespace App\Http\Controllers\Home;


use App\Models\Post;

class PostController
{
    public function show($id)
    {
        $post = Post::with('content', 'comment', 'comment.user')
            ->find($id);
        $post->increment('view_count', 1);
        $assign = compact('post');
        return view('home.post.show', $assign);
    }
}