<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{

    protected $table = 'admin_user';

    use Notifiable, SoftDeletes;
    use EntrustUserTrait; // add this trait to your user model
    protected $hidden = ['password', 'remember_token'];

    /**
     * 解决 EntrustUserTrait 和 SoftDeletes 冲突
     */
    public function restore()
    {
        $this->restoreEntrust();
        $this->restoreSoftDelete();
    }
    public function roleUser(){
        return $this->hasMany('App\Models\RoleUser','user_id','id');
    }
    public function rolesDetail()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id');
    }
    public function storeData($data)
    {
        try{
            $this->login_name = $data['login_name'];
            $this->real_name  = $data['real_name'];
            $this->phone      = $data['phone'];
            $this->password   = bcrypt($data['password']);
            $this->save();
            flash_message(AdminMessage::ADD);
        }catch (\Exception $e) {
            flash_message(AdminMessage::ADD_F, false);
        }
    }

    public function updateData($id, $data)
    {
        try{
            $admin = $this->find($id);
            $admin->login_name = $data['login_name'];
            $admin->real_name = $data['real_name'];
            $admin->phone = $data['phone'];
            if (!empty($data['password'])) {//密码留空表示不修改
                $admin->password = bcrypt($data['password']);
            }
            $admin->save();
            flash_message(AdminMessage::EDIT);
        }catch (\Exception $e) {
            flash_message(AdminMessage::EDIT_F, false);
        }
    }
}
