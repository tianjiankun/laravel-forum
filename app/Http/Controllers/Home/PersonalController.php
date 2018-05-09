<?php

namespace App\Http\Controllers\Home;

use App\Service\Post\PostService;
use App\Service\User\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //用户个人中心
    public function personal(PostService $postService)
    {
        $post = $postService->getUserPost(3);
        return view('home.personal.index',[
            'post' => $post
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
        return redirect('home/personal/index');
    }

    public function uploadImg()
    {
        $result = upload('editormd-image-file', 'uploads/post');
        if ($result['status_code'] === 200) {
            $data = [
                'success' => 1,
                'message' => $result['message'],
                'url' => $result['data']['path'].$result['data']['new_name']
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
}