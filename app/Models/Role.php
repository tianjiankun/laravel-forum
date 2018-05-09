<?php
/**
 * Created by PhpStorm.
 * Date: 2018/4/2/002
 * Time: 10:44
 */

namespace App\Models;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';

    public function rolesPermissionDetail()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id')->orderBy('sort','asc');
    }

    public function role_permission()
    {
        return $this->hasMany(PermissionRole::class,'role_id','id');
    }
}