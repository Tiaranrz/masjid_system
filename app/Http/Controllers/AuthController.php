<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
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

        // Coba untuk otentikasi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard')
                        ->with('success', 'Login sebagai Super Admin berhasil!');
                case 'admin_masjid':
                    return redirect()->route('admin.dashboard')
                        ->with('success', 'Login sebagai Admin berhasil!');
                case 'jamaah':
                    return redirect()->route('jamaah.dashboard')
                        ->with('success', 'Login sebagai Jamaah berhasil!');
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'login_error' => "Role `{$user->role}` tidak dikenali. Hubungi Super Admin."
                    ]);
            }
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
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // **PERBAIKAN:** Redirect ke halaman login ('login' adalah nama rute untuk '/sign-in')
        return redirect()->route('login');
    }
}
