<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    //
    protected $table = 'user';
    protected $rememberTokenName = '';
    use Notifiable, SoftDeletes;
    protected $hidden = ['password'];

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function info()
    {
        return $this->hasOne(UserInfo::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(PostComment::class, 'user_id', 'id');
    }
}
