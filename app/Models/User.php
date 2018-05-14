<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    //
    protected $table = 'user';
    use Notifiable, SoftDeletes;
    protected $hidden = ['password'];

    public function post()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}
