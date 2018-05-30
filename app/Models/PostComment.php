<?php

namespace App\Models;

class PostComment extends Base
{
    //
    protected $table = 'post_comment';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
