<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, Post $postModel)
    {
        $list = $postModel->getPostList($request);
        $assign = compact('list');
        return view('admin.post.index', $assign);
    }

    public function top($id, Request $request, Post $postModel)
    {
        $type = $request->get('type');
        $postModel->top($id, $type);
        return redirect('admin/post/list');
    }

    public function essence($id, Request $request, Post $postModel)
    {
        $type = $request->get('type');
        $postModel->essence($id, $type);
        return redirect('admin/post/list');
    }

    public function delete($id, Post $postModel)
    {
        $map = [
            'id' => $id
        ];
        $postModel->deleteData($map);
        return redirect('admin/post/list');
    }

    public function restore($id, Post $postModel)
    {
        $map = [
            'id' => $id
        ];
        $postModel->restoreData($map);
        return redirect('admin/post/list');
    }

    public function forceDelete($id, Post $postModel)
    {
        $map = [
            'id' => $id
        ];
        $postModel->forceDeleteData($map);
        return redirect('admin/post/list');
    }
}
