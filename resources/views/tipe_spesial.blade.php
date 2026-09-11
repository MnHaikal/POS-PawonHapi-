@extends('layouts.app')

@section('title', 'Tipe Spesial - Pawon Hapi')

@section('content')
<!-- Tabs -->
<div class="tabs-container">
    <a href="#" class="tab active" style="border-radius: 8px; margin: 4px; border: 1px solid var(--border-color);">Rilis Terbaru</a>
    <a href="#" class="tab" style="border-right: none;">Populer</a>
    <a href="#" class="tab" style="border-right: none;">Sale / Diskon</a>
    <a href="#" class="tab" style="border-right: none;">Pre-order</a>
    <a href="#" class="tab" style="border-right: none;">Habis Stok</a>
</div>

<!-- Page Header -->
<div class="page-header" style="margin-bottom: 20px;">
    <h1 class="page-title">Tipe Spesial</h1>
    <p class="page-subtitle">Produk berdasarkan tipe spesial yang ditandai</p>
</div>

<!-- Toolbar -->
<div class="toolbar" style="margin-bottom: 24px;">
    <div class="search-input-wrapper" style="width: 350px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari nama atau SKU...">
    </div>
</div>

<!-- Data Table -->
<div class="table-card">
    <table class="data-table-large">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Tipe Lain</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="product-cell">
                        <div class="product-img" style="display: flex; align-items: center; justify-content: center; background-color: #f1f5f9; color: var(--text-secondary);">
                            <i class="fa-solid fa-box"></i>
                        </div>
                        <div class="product-info">
                            <span class="product-name">Udang Goreng</span>
                            <span class="product-cat">XQVPVVKE</span>
                        </div>
                    </div>
                </td>
                <td style="color: var(--text-secondary);">Sefood</td>
                <td>Rp 30.000</td>
                <td>9</td>
                <td style="color: var(--text-secondary);">—</td>
                <td>
                    <span class="status-badge" style="background-color: var(--bg-sidebar); color: #fff;">Aktif</span>
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
