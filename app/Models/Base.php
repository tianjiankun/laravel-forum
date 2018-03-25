<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public function storeData($data)
    {
        $result = $this->create($data);
        if ($result) {
            flash_message(AdminMessage::ADD);
        } else {
            flash_message(AdminMessage::ADD_F, false);
        }
    }

    public function updateData($id, $data)
    {
        $model = $this->where('id', $id)
            ->get();
        // 可能有查不到数据的情况
        if ($model->isEmpty()) {
            flash_message(AdminMessage::NOT_FOUND, false);
            return false;
        }
        foreach ($model as $k => $v) {
            $result = $v->forceFill($data)->save();
        }
        if ($result) {
            flash_message(AdminMessage::EDIT);
            return $result;
        }else{
            return false;
        }
    }

    //软删除
    public function deleteData($map)
    {
        $result = $this->where($map)
            ->delete();
        if ($result) {
            flash_message(AdminMessage::DEL);
        } else {
            flash_message(AdminMessage::ADD_F, false);
        }
    }

    //恢复被软删除的数据
    public function restoreData($map)
    {
        $result = $this->where($map)
            ->restore();
        if ($result) {
            flash_message(AdminMessage::RESTORE);
        } else {
            flash_message(AdminMessage::RESTORE_F);
        }
    }

    //彻底删除
    public function forceDeleteData($map)
    {
        $result = $this->where($map)
            ->forceDelete();
        if ($result) {
            flash_message(AdminMessage::DEL);
        } else {
            flash_message(AdminMessage::ADD_F, false);
        }
    }
}
