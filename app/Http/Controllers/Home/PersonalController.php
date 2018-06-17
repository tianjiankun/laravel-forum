<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\PostComment;
use App\Service\Post\PostService;
use App\Service\User\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    //用户个人中心
    public function personal(PostService $postService)
    {
        $post = $postService->getUserPost(3);
        $reply = $postService->getUserReply(3);
        return view('home.personal.index', [
            'post' => $post,
            'reply' => $reply
        ]);
    }

    //发帖页面
    public function release()
    {
        return view('home.personal.release');
    }

    public function releaseHandle(Request $request, PostService $postService)
    {
        $postService->release($request);
        return redirect(route('personal'));
    }

    public function postList()
    {
        $list = Post::with('comment')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();
        $assign = compact('list');

        return view('home.personal.postList', $assign);
    }

    public function uploadImg()
    {
        $result = upload('editormd-image-file', 'uploads/post');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url' => $result['data']['path'] . $result['data']['new_name']
            ];
        } else {
            $data = [
                'success' => 0,
                'message' => $result['message'],
                'url' => ''
            ];
        }
        return response()->json($data);
    }

    public function replyList()
    {
        $list = Post::with('comment')
            ->whereHas('comment', function ($query) {
                $query->where('user_id', Auth::id());
            })->paginate();
        $assign = compact('list');
        return view('home.personal.replyList', $assign);
    }
}