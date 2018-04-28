<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Post extends Base
{
    //
    use SoftDeletes;
    protected $table = 'post';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reply()
    {
        return $this->hasMany(Reply::class,'post_id', 'id');
    }

    public function getPostList(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $title = $request->input('title');
        $type = $request->input('type');
        $post = $this->with([
            'user'=>function($query) use ($username){
                if ($username) {
                    $query->where('nickname', $username);
                }
            }])
            ->withTrashed();
        if ($id) {
            $post->where('id', $id);
        } else if ($title) {
            $post->where('title', $title);
        } else if ($type) {
            $post->where('is_essence', $type);
        }
        $list = $post->paginate(10);
        return $list;
    }

    //置顶|取消置顶
    public function top($id, $type)
    {
        $result = $this->where('id', $id)
            ->update([
                'is_top' => $type
            ]);
        $this->flashMessage($result);
    }

    //加精|取消精华
    public function essence($id, $type)
    {
        $result = $this->where('id', $id)
            ->update([
                'is_essence' => $type
            ]);
        $this->flashMessage($result);
    }

    //发帖
    public function release(Request $request, PostContent $postContent)
    {
        try {
            $this->category_id = $request->input('category_id');
            $this->keywords = $request->input('keywords');
            $this->description = $request->input('description');
            $this->title = $request->input('title');
            $this->user_id = Auth::id();
            $this->save();
            $postContent->post_id = $this->id;
            $postContent->content = $request->input('content');
            $postContent->save();
            flash_message('发帖成功');
        } catch (\Throwable $e) {
            flash_message( $e->getMessage(), false);
        }


    }
}
