<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Tampilkan semua notifikasi
     */
    public function index()
    {
        $notifications = Notification::with('user')->latest()->paginate(10);
        return view('superadmin.notifications.index', compact('notifications'));
    }

    /**
     * Form buat notifikasi baru
     */
    public function create()
    {
        $users = User::all();
        return view('superadmin.notifications.create', compact('users'));
    }

    /**
     * Simpan notifikasi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Notification::create([
            'user_id' => $request->user_id,
            'title'   => $request->title,
            'message' => $request->message,
            'status'  => 'unread',
        ]);

        return redirect()->route('superadmin.notifications.index')
                         ->with('success', 'Notification sent successfully.');
    }

    /**
     * Tampilkan detail notifikasi
     */
    public function show(Notification $notification)
    {
        return view('superadmin.notifications.show', compact('notification'));
    }

    /**
     * Hapus notifikasi
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('superadmin.notifications.index')
                         ->with('success', 'Notification deleted successfully.');
    }
}
