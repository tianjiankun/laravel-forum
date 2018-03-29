<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function getPostList($arr)
    {
        $postList = $this->with('user')
            ->withTrashed()
            ->get();
        return $postList;
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
