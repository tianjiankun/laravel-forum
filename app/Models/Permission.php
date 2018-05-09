<?php
/**
 * Created by PhpStorm.
 * Date: 2018/4/2/002
 * Time: 10:46
 */

namespace App\Models;


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = 'permission';

    public function permission_role()
    {
        return $this->hasMany(Permission::class,'permission_id','id');
    }
}