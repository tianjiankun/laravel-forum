<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\PostContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //用户个人中心
    public function personal()
    {
        return view('home.personal.index');
    }
    
    //发帖页面
    public function release()
    {
        return view('home.personal.release');
    }

    public function releaseHandle(Request $request, Post $post, PostContent $postContent)
    {
        $post->release($request, $postContent);
        return redirect('/');
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
