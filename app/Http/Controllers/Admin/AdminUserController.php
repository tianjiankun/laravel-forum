<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index()
    {
        $list = AdminUser::withTrashed()
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
        return redirect('admin/admin_user/list');
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
        return redirect('admin/admin_user/list');
    }

    public function delete($id, AdminUser $adminUserModel)
    {
        $map = [
            'id' => $id
        ];
        $adminUserModel->deleteData($map);
        return redirect('admin/admin_user/list');
    }

    public function restore($id, AdminUser $adminUserModel)
    {
        $map = [
            'id' => $id
        ];
        $adminUserModel->restoreData($map);
        return redirect('admin/admin_user/list');
    }

    public function forceDelete($id, AdminUser $adminUserModel)
    {
        $map = [
            'id' => $id
        ];
        $adminUserModel->forceDeleteData($map);
        return redirect('admin/admin_user/list');
    }
}
