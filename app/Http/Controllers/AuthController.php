<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Superadmin\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.sign-in');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek apakah user memiliki role 'superadmin'
            if ($user->role === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            }

            // Jika role-nya bukan 'superadmin', logout dan kirim pesan error
            Auth::logout();
            return back()->withErrors([
                'email' => 'Anda tidak memiliki akses Superadmin.',
            ])->withInput();
        }

        // Kalau gagal login (kredensial salah)
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    /**
     * Tampilkan halaman pendaftaran.
     */
     public function showSignUpForm()
    {
        return view('auth.sign-up'); // pastikan view ini ada
    }

    public function processSignUp(Request $request)
    {
        // validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // redirect ke halaman login
        return redirect()->route('sign-in')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sign-in');
    }
}
