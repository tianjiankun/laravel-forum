<?php
/**
 * Created by PhpStorm.
 * author: 田建昆
 * Date: 2018/2/5
 * Time: 17:51
 */



function flash_message($message = '成功', $success = true)
{
    $className = $success ? 'alert-success' : 'alert-danger';
    session()->flash('alert-message', $message);
    session()->flash('alert-class', $className);
}