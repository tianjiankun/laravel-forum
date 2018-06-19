<?php
namespace App\Service\Post;

use App\Models\Category;
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
            $post = new Post();
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
            die;
        }
    }

    /**
     * @param int $n
     * @return Post
     */
    public function getUserPost($n = 15)
    {
        $post = Post::with('comment')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($n)
            ->sortByDesc('is_essence')
            ->sortByDesc('is_top');
        return $post;
    }

    public function getUserReply($n = 15)
    {
        $post = Post::with('comment')
            ->whereHas('comment', function($query){
                $query->where('user_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->paginate($n)
            ->sortByDesc('is_essence')
            ->sortByDesc('is_top');
        return $post;
    }
    /**
     * @param Request $request
     * @param string $cid
     * @return Post
     */
    public function getPostListWithFilterByCid(Request $request, $cid)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');
        $filter = $this->getPostFilter($filter);
        $post= Post::with('user', 'comment')
            ->orderBy('sort', 'asc');
        if ($cid != 'index') {
            $post->where('category_id', $cid);
        }
        if ($filter == 'essence') {
            $post->where('is_essence', 2);
        }
        if ($search) {
            $post->where('title', 'like', "%$search%");
        }
        $list = $post->paginate();
        if ($filter == 'default') {
            $list = $list->sortByDesc('is_essence')
                ->sortByDesc('is_top');
        }
        return $list;
    }

    private function getPostFilter($request_filter)
    {
        $filter = ['essence', 'recent'];
        return in_array($request_filter, $filter) ? $request_filter : 'default';
    }
}