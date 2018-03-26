<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    //批量更新
    function updateBatch($multipleData = []){
        if (empty($multipleData)) {
            return false;
        }
        // 获取表名
        $tableName = config('database.connections.mysql.prefix').$this->getTable();
        $updateColumn = array_keys($multipleData[0]);
        $referenceColumn = $updateColumn[0];
        unset($updateColumn[0]);
        $whereIn = "";
        // 组合sql语句
        $sql = "UPDATE ".$tableName." SET ";
        foreach ( $updateColumn as $uColumn ) {
            $sql .=  $uColumn." = CASE ";
            foreach( $multipleData as $data ) {
                $sql .= "WHEN ".$referenceColumn." = '".$data[$referenceColumn]."' THEN '".$data[$uColumn]."' ";
            }
            $sql .= "ELSE ".$uColumn." END, ";
        }
        foreach( $multipleData as $data ) {
            $whereIn .= "'".$data[$referenceColumn]."', ";
        }
        $sql = rtrim($sql, ", ")." WHERE ".$referenceColumn." IN (".  rtrim($whereIn, ', ').")";
        // 更新
        $result = DB::update(DB::raw($sql));
        return $result;

    }
}
