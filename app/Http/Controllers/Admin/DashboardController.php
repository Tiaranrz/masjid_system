<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Halaman admin
    public function index()
    {
        return view('admin.dashboard');
    }

    // Halaman spesial page calender
    public function calender()
    {
        return view('app.calender');
    }

    // Halaman spesial page kanban
    public function kanban()
    {
        return view('app.kanban');
    }



    // Halaman Event
    public function event()
    {
        return view('app.event');
    }

    // Halaman Inventory
    public function inventory()
    {
        return view('app.inventory');
    }

    // Halaman Jamaah
    public function jamaah()
    {
        return view('app.jamaah');
    }

    // Halaman ZISWAF
    public function ziswaf()
    {
        return view('app.ziswaf');
    }


    // Tambah Event
    public function event()
    {
        return view('app.event-add');
    }

    // Tambah Inventory
    public function inventory()
    {
        return view('app.inventory-add');
    }

    // Tambah Jamaah
    public function jamaah()
    {
        return view('app.jamaah');
    }

    // Tambah ZISWAF
    public function ziswaf()
    {
        return view('app.ziswaf');
    }
}
