<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Base
{
    //
    protected $table = 'user';
    use SoftDeletes;

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
