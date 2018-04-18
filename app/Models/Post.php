<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

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
        }
        $list = $post->paginate(10);
        return $list;
    }

    public function top($id, $type)
    {
        $result = $this->where('id', $id)
            ->update([
                'is_top' => $type
            ]);
        $this->flashMessage($result);
    }

    public function essence($id, $type)
    {
        $result = $this->where('id', $id)
            ->update([
                'is_essence' => $type
            ]);
        $this->flashMessage($result);
    }
}
