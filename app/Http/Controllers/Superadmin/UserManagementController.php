<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('superadmin.users.index', compact('users'));
    }

    public function create()
    {
        return view('superadmin.users.create');
    }

    public function store(Request $request)
    {
        // logic untuk create user
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('superadmin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // logic untuk update user
    }

    public function destroy($id)
    {
        // logic untuk delete user
    }
}
