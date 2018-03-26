<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Base
{
    use SoftDeletes;
    protected  $table = 'category';
    //

    public function storeData($data)
    {
        try {
            $category = new Category();
            $category->name = $data['name'];
            $category->keyword = $data['keyword'];
            $category->description = $data['description'];
            $category->sort = $data['sort'];
            $category->save();
            flash_message(AdminMessage::ADD);
        } catch (\Throwable $e) {
            flash_message(AdminMessage::ADD_F, false);
        }
    }
}
