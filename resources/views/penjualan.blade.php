@extends('layouts.app')

@section('title', 'Penjualan - Pawon Hapi')

@section('content')
<!-- Tabs -->
<div class="tabs-container">
    <a href="#" class="tab active" style="border-radius: 8px; margin: 4px; border: 1px solid var(--border-color);">Butuh Diproses</a>
    <a href="#" class="tab" style="border-right: none;">Selesai</a>
    <a href="#" class="tab" style="border-right: none;">Pengembalian</a>
    <a href="#" class="tab" style="border-right: none;">Dibatalkan</a>
</div>

<!-- Page Header -->
<div class="page-header" style="margin-bottom: 24px;">
    <h1 class="page-title">Penjualan</h1>
    <p class="page-subtitle">Daftar transaksi penjualan manual</p>
</div>

<!-- Toolbar -->
<div class="toolbar" style="margin-bottom: 20px;">
    <div class="search-input-wrapper" style="width: 250px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari no. order atau pelanggan">
    </div>
    
    <div>
        <button class="btn" style="padding: 8px 12px;"><i class="fa-regular fa-calendar"></i> Hari Ini</button>
    </div>
</div>

<!-- Data Table -->
<div class="table-card">
    <table class="data-table-large">
        <thead>
            <tr>
                <th>No. Pesanan</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Status</th>
                <th>Total</th>
                <th>Sisa Bayar</th>
                <th>Pembayaran</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div style="font-family: monospace; color: var(--text-primary); margin-bottom: 4px; font-size: 12px;">ORD-20260910-0007</div>
                    <span class="badge-blue-outline"><i class="fa-solid fa-utensils" style="font-size: 9px;"></i> Meja 11</span>
                </td>
                <td style="color: var(--text-secondary);">10 Sep 2026, 15.14</td>
                <td style="color: var(--text-secondary);">yyyyyyy</td>
                <td><span class="badge-blue-fill">Dikonfirmasi</span></td>
                <td style="font-weight: 500;">Rp 19.000</td>
                <td style="color: var(--accent-red); font-weight: 500;">Rp 19.000</td>
                <td><span class="badge-red-fill">Belum Bayar</span></td>
                <td style="text-align: right;">
                    <button class="icon-btn-outline"><i class="fa-solid fa-clock-rotate-left"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="table-footer">
        <span>Per halaman: </span>
        <select>
            <option>20</option>
            <option>50</option>
            <option>100</option>
        </select>
        <span style="margin-left: 12px;">1-1 dari 1</span>
    </div>
</div>
@endsection
