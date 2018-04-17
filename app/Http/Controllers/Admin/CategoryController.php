<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Libraries\AdminMessage;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $list = Category::withTrashed()
            ->orderBy('sort', 'asc')
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
        $data = Category::withTrashed()->find($id);
        $assign = compact('data');
        return view('admin.category.edit', $assign);
    }

    public function store(StoreRequest $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $categoryModel->storeData($data);
        return redirect('admin/category/list');
    }

    public function update($id, UpdateRequest $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $categoryModel->updateData($id, $data);
        return redirect('admin/category/list');
    }
    
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list');
    }
    
    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->restore();
        return redirect('admin/category/list');
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->find($id);
        $category->forceDelete();
        return redirect('admin/category/list');
    }

    public function sort(Request $request, Category $categoryModel)
    {
        $data = $request->except('_token');
        $sortData = [];
        foreach ($data as $k => $v) {
            $sortData[] = [
                'id' => $k,
                'sort' => $v
            ];
        }
        $categoryModel->updateBatch($sortData);
        return redirect('admin/category/list');
    }
}
