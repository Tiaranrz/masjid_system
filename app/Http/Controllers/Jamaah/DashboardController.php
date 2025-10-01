<?php

namespace App\Http\Controllers\Jamaah;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('jamaah.dashboard');
    }
}
