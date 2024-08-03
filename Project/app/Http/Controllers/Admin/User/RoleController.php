<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\RoleRequest;
use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')->simplePaginate(15);
        return view("admin.user.role.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy("created_at", "desc")->simplePaginate(15);
        return view("admin.user.role.create", compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $inputs = $request->all();
        $role = Role::create($inputs);
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        return redirect()->route('user.role.index')->with('toast-success', 'نقش با سطح دسترسی با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('admin.user.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $inputs = $request->all();
        $role = Role::find($id);
        $role->update($inputs);
        return redirect()->route('user.role.index')->with('toast-success', 'نقش با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('user.role.index')->with('toast-success', 'سطح دسترسی نقش با موفقیت حذف شد');
    }

    public function permissionForm(Role $role)
    {
        $permissions = Permission::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.user.role.set-permission', compact('role', 'permissions'));
    }

    public function permissionUpdate(RoleRequest $request, Role $role)
    {
        $inputs = $request->all();
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        return redirect()->route('user.role.index')->with('toast-success', 'سطح دسترسی نقش با موفقیت ویرایش شد');
    }
}
