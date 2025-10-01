@extends('admin.layouts.app')

@section('title', 'Laporan Keuangan')

@section('title_header', 'Laporan Donasi & ZISWAF')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="header-title">
                    <h4 class="card-title">Ringkasan Pemasukan Masjid</h4>
                    <p class="mb-0 text-muted">Periode: {{ \Carbon\Carbon::create($year, $month)->format('F Y') }}</p>
                </div>

                {{-- Form Filter Periode --}}
                <div class="d-flex align-items-center">
                    <form method="GET" action="{{ route('admin.laporan.index') }}" class="d-flex gap-2">
                        <select name="month" class="form-select form-select-sm">
                            @for ($m=1; $m<=12; $m++)
                                <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                                </option>
                            @endfor
                        </select>
                        <input type="number" name="year" class="form-control form-control-sm w-75" value="{{ $year }}" min="2020" max="{{ date('Y') }}">
                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    </form>
                </div>
            </div>

            <div class="card-body">

                {{-- Bagian Pricing Card (Ringkasan KPI Utama) --}}
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-5 text-center">

                    {{-- KPI 1: Donasi Umum (Menggantikan Kartu Pricing) --}}
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title text-success">
                                    Rp {{ number_format($totalDonasi, 0, ',', '.') }}
                                </h1>
                                <h4 class="my-0 fw-normal mt-3">Donasi Umum</h4>
                                <p class="text-muted">Total Pemasukan Donasi Bulan Ini</p>
                            </div>
                        </div>
                    </div>

                    {{-- KPI 2: ZISWAF (Menggantikan Kartu Pricing) --}}
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-lg border-warning">
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title text-warning">
                                    Rp {{ number_format($totalZiswaf, 0, ',', '.') }}
                                </h1>
                                <h4 class="my-0 fw-normal mt-3">ZISWAF</h4>
                                <p class="text-muted">Total Penerimaan ZISWAF Bulan Ini</p>
                            </div>
                        </div>
                    </div>

                    {{-- KPI 3: Saldo Kas Akhir (Asumsi Anda bisa menghitungnya) --}}
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title text-primary">
                                    Rp 15.000.000
                                    {{-- Ganti dengan variabel Saldo Akhir jika ada --}}
                                </h1>
                                <h4 class="my-0 fw-normal mt-3">Estimasi Kas Akhir</h4>
                                <p class="text-muted">Saldo akhir bulan (Pemasukan - Pengeluaran)</p>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="mt-4">

                {{-- Bagian Detail Transaksi (Menggantikan Tabel Feature Comparison) --}}
                <h5 class="card-title pt-3 mb-3">Detail Semua Transaksi Pemasukan</h5>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Dicatat Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge {{ $transaction->type == 'donasi' ? 'bg-primary' : 'bg-success' }}">
                                        {{ strtoupper($transaction->type) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->description }}</td>
                                <td>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                <td>{{ $transaction->recordedBy->name ?? 'Admin Sistem' }}</td>
                                {{-- Memerlukan relasi recordedBy di Model Keuangan dan nama di Model User --}}
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data transaksi di bulan ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        {{ $transactions->links() }}
                    </div>
                    <button type="button" class="btn btn-info mt-3">
                        <i class="ri-printer-line me-2"></i> Cetak Laporan
                    </button>
                </div>

            </div> {{-- End Card Body --}}
        </div>
    </div>
</div>
@endsection
