<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $list = AdminUser::where('is_seal',0)
            ->get();
        $assign = compact('list');
        return view('admin.admin-user.index', $assign);
    }

    public function add()
    {
        return view('admin.admin-user.add');
    }

    public function store(Request $request, AdminUser $adminUserModel)
    {
        $data = $request->all();
        $adminUserModel->storeData($data);
        return redirect('admin/admin-user/index');
    }

    public function edit($id)
    {
        $data = AdminUser::find($id);
        $assign = compact('data');
        return view('admin.admin-user.edit', $assign);
    }

    public function update($id, Request $request, AdminUser $adminUserModel)
    {
        $data = $request->all();
        $adminUserModel->updateData($id, $data);
        return redirect('admin/admin-user/index');
    }

    public function delete($id, AdminUser $adminUserModel)
    {
        $map = [
            'id' => $id
        ];
        $adminUserModel->deleteData($map);
        return redirect('admin/admin-user/index');
    }
}
