<?php

namespace App\Models;

class Post extends Base
{
    //
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

    }
}
