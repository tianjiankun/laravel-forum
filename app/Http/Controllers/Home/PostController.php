<?php


namespace App\Http\Controllers\Home;


use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function show($id)
    {
        $post = Post::with('content', 'comment', 'comment.user', 'comment.user.info')
            ->find($id);
        $post->increment('view_count', 1);
        $assign = compact('post');
        return view('home.post.show', $assign);
    }

    public function comment($id, Request $request)
    {
        try{
            $content = $request->input('content');
            $postComment = new PostComment();
            $postComment->content = $content;
            $postComment->post_id = $id;
            $postComment->user_id = Auth::id();
            $postComment->save();
            flash_message('回复成功');
        } catch (\Throwable $e) {
            flash_message($e->getMessage());
        }
        return redirect(route('post.show', $id));
    }
}