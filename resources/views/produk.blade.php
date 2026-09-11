@extends('layouts.app')

@section('title', 'Produk - Pawon Hapi')

@section('content')
<!-- Tabs -->
<div class="tabs-container">
    <a href="#" class="tab active">Produk</a>
    <a href="#" class="tab">Kategori</a>
    <a href="#" class="tab">Bundle / Paket</a>
    <a href="#" class="tab">Addon / Modifier</a>
</div>

<!-- Page Header -->
<div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        <h1 class="page-title">Produk</h1>
        <p class="page-subtitle">Kelola produk outlet ini</p>
    </div>
    <div class="page-actions">
        <button class="btn"><i class="fa-solid fa-print"></i> Export</button>
        <button class="btn"><i class="fa-solid fa-arrow-up-from-bracket"></i> Import</button>
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Produk</button>
    </div>
</div>

<!-- Toolbar -->
<div class="toolbar">
    <div class="search-input-wrapper">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari sate...">
        <i class="fa-solid fa-xmark" style="cursor: pointer; margin-left: 8px; font-size: 14px; color: var(--text-secondary);"></i>
    </div>
    
    <div class="filter-dropdown">
        <i class="fa-solid fa-filter"></i> Filter: 
        <select>
            <option>Semua Stok</option>
            <option>Stok Menipis</option>
            <option>Habis</option>
        </select>
    </div>
</div>

<!-- Data Table -->
<div class="table-card">
    <table class="data-table-large">
        <thead>
            <tr>
                <th style="width: 40px;"><input type="checkbox" style="width: 16px; height: 16px; border-radius: 4px;"></th>
                <th>Produk</th>
                <th>SKU</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" style="width: 16px; height: 16px; border-radius: 4px;"></td>
                <td>
                    <div class="product-cell">
                        <img src="https://via.placeholder.com/40?text=Sate" alt="Sate Ayam" class="product-img">
                        <div class="product-info">
                            <span class="product-name">sate ayam</span>
                            <span class="product-cat">Makanan Utama</span>
                        </div>
                    </div>
                </td>
                <td style="color: var(--text-secondary); font-family: monospace;">FN9ULXIS</td>
                <td><span class="stok-badge">0</span></td>
                <td>Rp 20.000</td>
                <td>Rp 30.000</td>
                <td>
                    <div class="status-toggle">
                        <div class="toggle-switch"></div> Tersedia
                    </div>
                </td>
                <td style="text-align: right; color: var(--text-secondary); cursor: pointer;">
                    <i class="fa-solid fa-ellipsis"></i>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="table-footer">
        <span>Per halaman: </span>
        <select>
            <option>1000</option>
            <option>500</option>
            <option>100</option>
        </select>
        <span style="margin-left: 12px;">1-1 dari 1</span>
    </div>
</div>
@endsection
