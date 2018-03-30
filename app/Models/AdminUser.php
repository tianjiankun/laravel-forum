<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AdminUser extends Base
{

    use SoftDeletes;
    protected $table = 'admin_user';

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
