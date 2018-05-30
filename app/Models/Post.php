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

    public function comment()
    {
        return $this->hasMany(PostComment::class,'post_id', 'id');
    }

    public function content()
    {
        return $this->hasOne(PostContent::class, 'post_id', 'id');
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


}
