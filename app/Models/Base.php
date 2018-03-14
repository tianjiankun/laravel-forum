<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    //
    public function deleteData($map)
    {
        $result = $this->where($map)
            ->delete();
        if ($result) {
            flash_message('删除成功');
        } else {
            flash_message('删除失败', false);
        }
    }

    public function storeData($data)
    {
        $result = $this->create($data);
        if ($result) {
            flash_message('添加成功');
        } else {
            flash_message('添加失败', false);
        }
    }

    public function updateData($id, $data)
    {
        $model = $this->where('id', $id)
            ->get();
        // 可能有查不到数据的情况
        if ($model->isEmpty()) {
            flash_message('无需要添加的数据', false);
            return false;
        }
        foreach ($model as $k => $v) {
            $result = $v->forceFill($data)->save();
        }
        if ($result) {
            flash_message('修改成功');
            return $result;
        }else{
            return false;
        }
    }
}
