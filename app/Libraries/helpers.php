<?php
/**
 * Created by PhpStorm.
 * author: 田建昆
 * Date: 2018/2/5
 * Time: 17:51
 */
use HyperDown\Parser;


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

function markdown_to_html($markdown)
{
    // 正则匹配到全部的iframe
    preg_match_all('/&lt;iframe.*iframe&gt;/', $markdown, $iframe);
    // 如果有iframe 则先替换为临时字符串
    if (!empty($iframe[0])) {
        $tmp = [];
        // 组合临时字符串
        foreach ($iframe[0] as $k => $v) {
            $tmp[] = '【iframe'.$k.'】';
        }
        // 替换临时字符串
        $markdown = str_replace($iframe[0], $tmp, $markdown);
        // 讲iframe转义
        $replace = array_map(function ($v){
            return htmlspecialchars_decode($v);
        }, $iframe[0]);
    }
    // markdown转html
    $parser = new Parser();
    $html = $parser->makeHtml($markdown);
    $html = str_replace('<code class="', '<code class="lang-', $html);
    // 将临时字符串替换为iframe
    if (!empty($iframe[0])) {
        $html = str_replace($tmp, $replace, $html);
    }
    return $html;
}