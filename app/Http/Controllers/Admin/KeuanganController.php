<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin\Keuangan; // Sesuaikan namespace model jika berbeda.

class KeuanganController extends Controller
{
    public function index()
    {
        // Secara default, arahkan ke halaman Donasi sebagai halaman utama Keuangan
        return redirect()->route('admin.keuangan.donasi');
    }

    public function donasi()
    {
        $donasi_list = Keuangan::where('type', 'donasi')
                                ->latest()
                                ->paginate(10);

        return view('admin.keuangan.donasi', compact('donasi_list'));
    }

    public function ziswaf()
    {
        $ziswaf_list = Keuangan::where('type', 'ziswaf')
                                ->latest()
                                ->paginate(10);

        return view('admin.keuangan.ziswaf', compact('ziswaf_list'));
    }

    public function create()
    {
        return view('admin.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Pertahankan 'pengeluaran' jika Anda berencana menggunakannya
            'type' => 'required|in:donasi,ziswaf,pengeluaran',
            'amount' => 'required|numeric|min:1000',
            'description' => 'required|string|max:255',
            'transaction_date' => 'required|date', // Gunakan nama kolom yang benar: transaction_date
            'recorded_by_user_id' => 'nullable|exists:users,id',
        ]);

        Keuangan::create($request->all());

        // Redirect cerdas berdasarkan tipe transaksi yang baru dicatat
        $target_route = 'admin.keuangan.index'; // Default
        if ($request->type == 'donasi') {
            $target_route = 'admin.keuangan.donasi';
        } elseif ($request->type == 'ziswaf') {
            $target_route = 'admin.keuangan.ziswaf';
        }
        // Jika Anda punya rute admin.keuangan.pengeluaran, Anda bisa tambahkan disini

        Session::flash('success', 'Transaksi keuangan berhasil dicatat!');
        return redirect()->route($target_route);
    }

    // Metode show, edit, update, dan destroy (dapat ditambahkan sesuai kebutuhan)
}
