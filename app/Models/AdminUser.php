<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class AdminUser extends Base
{

    use SoftDeletes;
    protected $table = 'admin_user';

    public function storeData($data)
    {
        DB::beginTransaction();
        try{
            $this->login_name = $data['login_name'];
            $this->real_name  = $data['real_name'];
            $this->phone      = $data['phone'];
            $this->save();
            $id = $this->id;
            $adminAuth = new AdminUserAuth();
            $adminAuth->admin_id = $id;
            $adminAuth->password = bcrypt($data['password']);
            $result = $adminAuth->save();
            DB::commit();
            if ($result) {
                flash_message("添加成功");
            }
        }catch (\Exception $e) {
            DB::rollback();
            flash_message($e->getMessage(), false);
        }
    }

    public function updateData($id, $data)
    {
        DB::beginTransaction();
        try{
            $admin = self::find($id);
            $admin->login_name = $data['login_name'];
            $admin->real_name  = $data['real_name'];
            $admin->phone      = $data['phone'];
            $result = $admin->save();
            $id = $admin->id;
            if (!empty($data['password'])) {//密码留空表示不修改
                $adminAuth = AdminUserAuth::where('admin_id', $id)
                    ->first();
                $adminAuth->password = bcrypt($data['password']);
                $adminAuth->save();
            }
            DB::commit();
            if ($result) {
                flash_message("修改成功");
            }
        }catch (\Exception $e) {
            DB::rollback();
            flash_message($e->getMessage(), false);
        }
    }
}
