<?php
/**
 * Created by PhpStorm.
 * Date: 2018/4/2/002
 * Time: 10:44
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }
}