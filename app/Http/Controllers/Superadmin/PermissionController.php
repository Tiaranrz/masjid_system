<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
    $permissions = Permission::all();
    return view('superadmin.role_permission.index', compact('permissions'));
    }
    
    public function create()
    {
    return view('superadmin.role_permission.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'description' => 'nullable|string',
        ]);

        Permission::create($data);
        Session::flash('success', 'Permission berhasil ditambahkan!');
        return redirect()->route('superadmin.role_permission.index');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission)
    {
        return view('superadmin.role_permission.edit', compact('permission'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'description' => 'nullable|string',
        ]);

        $permission->update($data);
        Session::flash('success', 'Permission berhasil diperbarui!');
        return redirect()->route('superadmin.role_permission.index');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        Session::flash('success', 'Permission berhasil dihapus!');
        return redirect()->route('superadmin.role_permission.index');
    }
}
