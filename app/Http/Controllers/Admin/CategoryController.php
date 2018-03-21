<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $list = Category::orderBy('sort', 'asc')
            ->get();
        $assign = compact('list');
        return view('admin.category.index', $assign);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        $assign = compact('data');
        return view('admin.category.edit', $assign);
    }

    public function store(Request $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $categoryModel->storeData($data);
        return redirect('admin/category/list');
    }

    public function update($id, Request $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $categoryModel->updateData($id, $data);
        return redirect('admin/category/list');
    }

    public function delete($id, Category $categoryModel)
    {
        $map = [
            'id' => $id
        ];
        $categoryModel->deleteData($map);
        return redirect('admin/admin-user/index');
    }

}
