<?php

namespace App\Models;

use App\Libraries\AdminMessage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Base
{
    use SoftDeletes;
    protected  $table = 'category';

    public function storeData($data)
    {
        try {
            $category = new Category();
            $this->saveData($category, $data);
            flash_message(AdminMessage::ADD);
        } catch (\Throwable $e) {
            flash_message(AdminMessage::ADD_F, false);
        }
    }

    public function updateData($id, $data)
    {
        try {
            $category = Category::find($id);
            $this->saveData($category, $data);
            flash_message(AdminMessage::EDIT);
        } catch (\Throwable $e) {
            flash_message(AdminMessage::EDIT_F, false);
        }
    }

    private function saveData($category, $data)
    {
        $category->name = $data['name'];
        $category->keyword = $data['keyword'];
        $category->description = $data['description'];
        $category->sort = $data['sort'];
        $category->save();
    }
}
