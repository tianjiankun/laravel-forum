<?php
/**
 * Created by PhpStorm.
 * author: 田建昆
 * Date: 2018/2/5
 * Time: 17:51
 */


//操作提示
function flash_message($message = '成功', $success = true)
{
    $className = $success ? 'alert-success' : 'alert-danger';
    session()->flash('alert-message', $message);
    session()->flash('alert-class', $className);
}

function upload($file, $path = 'upload', $childPath = true)
{
    //判断请求中是否包含name=file的上传文件
    if (!request()->hasFile($file)) {
        $data = ['status_code' => 500, 'message' => '上传文件为空'];
        return $data;
    }
    $file = request()->file($file);
    //判断文件上传过程中是否出错
    if (!$file->isValid()) {
        $data = ['status_code' => 500, 'message' => '文件上传出错'];
        return $data;
    }
    //兼容性的处理路径的问题
    if ($childPath == true) {
        $path = './' . trim($path, './') . '/' . date('Ymd') . '/';
    } else {
        $path = './' . trim($path, './') . '/';
    }
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }
    //获取上传的文件名
    $oldName = $file->getClientOriginalName();
    //组合新的文件名
    $newName = uniqid() . '.' . $file->getClientOriginalExtension();
    //上传失败
    if (!$file->move($path, $newName)) {
        $data = ['status_code' => 500, 'message' => '保存文件失败'];
        return $data;
    }
    //上传成功
    $data = ['status_code' => 200, 'message' => '上传成功', 'data' => ['old_name' => $oldName, 'new_name' => $newName, 'path' => trim($path, '.')]];
    return $data;
}