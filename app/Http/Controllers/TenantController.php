<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function switch($tenantId)
    {
        // Validasi tenant yang diizinkan
        $allowedTenants = ['masjid1', 'masjid2'];

        if (!in_array($tenantId, $allowedTenants)) {
            return redirect()->back()->with('error', 'Tenant tidak valid');
        }

        // Simpan di session
        session(['current_tenant_id' => $tenantId]);

        return redirect()->back()->with('success', 'Berhasil beralih ke ' . $this->getTenantName($tenantId));
    }

    protected function getTenantName($tenantId)
    {
        $names = [
            'masjid1' => 'Masjid Al-Ikhlas',
            'masjid2' => 'Masjid An-Nur'
        ];

        return $names[$tenantId] ?? $tenantId;
    }
}
