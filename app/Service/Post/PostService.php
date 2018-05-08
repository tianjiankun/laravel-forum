<?php
namespace App\Service\Post;

use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    /**
     * @param Request $request
     */
    public function release(Request $request)
    {
        try {
            $post = new Post;
            $postContent = new PostContent();
            $content = $request->input('content');
            $post->category_id = $request->input('category_id');
            $post->keywords = $request->input('keywords');
            $post->description = $request->input('description')
                ?: substr($content, 0 ,100);
            $post->title = $request->input('title');
            $post->user_id = Auth::id();
            $post->save();
            $postContent->post_id = $post->id;
            $postContent->content = $content;
            $postContent->save();
            flash_message('发帖成功');
        } catch (\Throwable $e) {
            echo  $e->getMessage();
        }
    }

    /**
     * @param int $n
     * @return Post
     */
    public function getUserPost($n = null)
    {
        $post = Post::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($n)
            ->sortByDesc('is_essence')
            ->sortByDesc('is_top');
        return $post;
    }
}