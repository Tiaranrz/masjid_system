<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tenant;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    public function index()
    {
        $currentTenant = session('current_tenant_id', 'masjid1');

        // Data semua tenants
        $tenants = Tenant::all();

        // Statistik untuk tenant aktif
        $stats = [
            'totalEvents' => Event::forTenant($currentTenant)->count(),
            'upcomingEvents' => Event::forTenant($currentTenant)
                                   ->where('event_date', '>=', now())
                                   ->where('status', 'upcoming')
                                   ->count(),
        ];

        // Statistik per tenant untuk tabel
        $tenantsWithStats = [];
        foreach ($tenants as $tenant) {
            $tenantsWithStats[] = [
                'id' => $tenant->id,
                'name' => $tenant->name,
                'address' => $tenant->address,
                'phone' => $tenant->phone,
                'email' => $tenant->email,
                'status' => $tenant->status,
                'totalEvents' => Event::forTenant($tenant->id)->count(),
                'upcomingEvents' => Event::forTenant($tenant->id)
                                       ->where('event_date', '>=', now())
                                       ->where('status', 'upcoming')
                                       ->count(),
                'isActive' => $currentTenant == $tenant->id
            ];
        }

         return view('superadmin.masjid.index', [
            'masjids' => $tenants,
            'currentTenant' => $currentTenant
        ]);

    }
}
