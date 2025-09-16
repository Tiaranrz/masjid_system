<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Superadmin\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan role
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        $users = $query->paginate(10);

        return view('superadmin.users.index', compact('users'));
    }

    /**
     * Form tambah user
     */
    public function create()
    {
        return view('superadmin.users.create');
    }

    /**
     * Simpan user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:20',
            'role'         => 'required|in:superadmin,admin,jamaah',
            'gender_id'    => 'nullable|in:1,2',
        ]);

        User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'role'         => $request->role,
            'gender_id'    => $request->gender_id,
        ]);

        return redirect()->route('superadmin.users.index')
                         ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Tampilkan profil pengguna
     */
    public function show(User $user)
    {
        return view('superadmin.users.profile', compact('user'));
    }

    /**
     * Update user
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:6',
            'role' => 'required|string|in:superadmin,admin,jamaah',
            'gender_id' => 'nullable|integer',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('superadmin.users.show', $user->id)
                         ->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Hapus user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('superadmin.users.index')
                         ->with('success', 'User berhasil dihapus');
    }

    /**
     * Reset password ke default
     */
    public function resetPassword(User $user)
    {
        $user->password = Hash::make('password123');
        $user->save();

        return redirect()->route('superadmin.users.index')
                         ->with('success', 'Password berhasil direset ke: password123');
    }
}
