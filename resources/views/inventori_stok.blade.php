@extends('layouts.app')

@section('title', 'Inventori & Stok - Pawon Hapi')

@section('content')
<!-- Tabs -->
<div class="tabs-container">
    <a href="#" class="tab active" style="border-radius: 8px; margin: 4px; border: 1px solid var(--border-color);">Koreksi Stok</a>
    <a href="#" class="tab" style="border-right: none;">Stok Opname</a>
    <a href="#" class="tab" style="border-right: none;">Pergerakan Stok</a>
</div>

<!-- Page Header -->
<div class="page-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Koreksi Stok</h1>
        <p class="page-subtitle">Riwayat pergerakan dan penyesuaian stok produk</p>
    </div>
    <div class="page-actions">
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Atur Stok</button>
    </div>
</div>

<!-- Toolbar -->
<div class="toolbar" style="margin-bottom: 20px;">
    <div class="search-input-wrapper" style="width: 250px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari produk atau SKU...">
    </div>
    
    <div>
        <label style="display: block; font-size: 10px; color: var(--text-secondary); margin-bottom: 4px;">Tanggal</label>
        <button class="btn" style="padding: 6px 12px;"><i class="fa-regular fa-calendar"></i> Hari Ini</button>
    </div>
</div>

<!-- Data Table -->
<div class="table-card">
    <table class="data-table-large">
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Produk</th>
                <th>Tipe</th>
                <th>Sumber</th>
                <th>Perubahan</th>
                <th>Sebelum</th>
                <th>Sesudah</th>
                <th>Catatan</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="color: var(--text-secondary);">10 Sep 2026, 11.46</td>
                <td>
                    <div style="font-weight: 500;">sate ayam</div>
                    <div style="font-size: 10px; color: var(--text-secondary); font-family: monospace;">FN9ULXIS</div>
                </td>
                <td><span style="border: 1px solid var(--border-color); background-color: #f8fafc; color: var(--text-secondary); padding: 4px 8px; border-radius: 4px; font-size: 11px;">Stok Keluar</span></td>
                <td style="color: var(--text-secondary);">Penjualan</td>
                <td style="color: var(--accent-red); font-weight: 500;">-1</td>
                <td>0</td>
                <td style="font-weight: 600;">0</td>
                <td style="color: var(--text-secondary);">Penjualan ORD-20260910-0006</td>
                <td style="color: var(--text-secondary);">Kasir Pawon Hepi</td>
            </tr>
            <tr>
                <td style="color: var(--text-secondary);">10 Sep 2026, 11.05</td>
                <td>
                    <div style="font-weight: 500;">Udang Goreng</div>
                    <div style="font-size: 10px; color: var(--text-secondary); font-family: monospace;">XQVPVVKE</div>
                </td>
                <td><span style="border: 1px solid var(--border-color); background-color: #f8fafc; color: var(--text-secondary); padding: 4px 8px; border-radius: 4px; font-size: 11px;">Stok Keluar</span></td>
                <td style="color: var(--text-secondary);">Penjualan</td>
                <td style="color: var(--accent-red); font-weight: 500;">-1</td>
                <td>10</td>
                <td style="font-weight: 600;">9</td>
                <td style="color: var(--text-secondary);">Penjualan ORD-20260910-0004</td>
                <td style="color: var(--text-secondary);">Kasir Pawon Hepi</td>
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
        <span style="margin-left: 12px;">1-2 dari 2</span>
    </div>
</div>
@endsection
