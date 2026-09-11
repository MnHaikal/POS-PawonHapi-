@extends('layouts.app')

@section('title', 'Dashboard - Pawon Hapi')

@section('content')
<div class="page-header">
    <h1 class="page-title">Pawon Hepi</h1>
    <p class="page-subtitle">Sekilas 10 Sep 2026 - 10 Sep 2026 <button style="float: right; background: white; border: 1px solid #e2e8f0; padding: 4px 10px; border-radius: 6px; font-size: 12px; cursor: pointer;"><i class="fa-regular fa-calendar"></i> Hari Ini</button></p>
</div>

<!-- Metrics Grid -->
<div class="metrics-grid">
    <!-- Card 1 -->
    <div class="metric-card">
        <div class="metric-icon green">
            <i class="fa-solid fa-arrow-trend-up"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Omzet Periode Ini</span>
            <span class="metric-value">Rp 238rb</span>
            <span class="metric-sub">6 transaksi</span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="metric-card">
        <div class="metric-icon green" style="background-color: #ecfdf5; color: #059669;">
            <i class="fa-solid fa-money-bill-wave"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Omzet Hari Ini</span>
            <span class="metric-value">Rp 238rb</span>
            <span class="metric-sub">6 transaksi</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="metric-card">
        <div class="metric-icon green" style="background-color: #f0fdf4; color: #16a34a;">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Total Pelanggan</span>
            <span class="metric-value">0</span>
            <span class="metric-sub">+0 periode ini</span>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="metric-card">
        <div class="metric-icon green" style="background-color: #f0fdfa; color: #0d9488;">
            <i class="fa-solid fa-box"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Produk Aktif</span>
            <span class="metric-value">79</span>
            <span class="metric-sub" style="color: transparent;">-</span> <!-- Spacer -->
        </div>
    </div>

    <!-- Card 5 -->
    <div class="metric-card">
        <div class="metric-icon red">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Stok Menipis</span>
            <span class="metric-value">1</span>
            <span class="metric-sub" style="color: transparent;">-</span>
        </div>
    </div>

    <!-- Card 6 -->
    <div class="metric-card">
        <div class="metric-icon green" style="background-color: #ecfdf5; color: #10b981;">
            <i class="fa-solid fa-arrow-down"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Stok Masuk Periode Ini</span>
            <span class="metric-value">0 unit</span>
            <span class="metric-sub" style="color: transparent;">-</span>
        </div>
    </div>

    <!-- Card 7 -->
    <div class="metric-card">
        <div class="metric-icon yellow">
            <i class="fa-solid fa-arrow-up"></i>
        </div>
        <div class="metric-details">
            <span class="metric-label">Stok Keluar Periode Ini</span>
            <span class="metric-value">2 unit</span>
            <span class="metric-sub" style="color: transparent;">-</span>
        </div>
    </div>
</div>

<!-- Chart Area -->
<div class="chart-card">
    <div class="card-title">
        <i class="fa-solid fa-chart-line"></i> Grafik Omzet
    </div>
    <div class="chart-placeholder">
        <div class="y-axis">
            <span>Rp 140rb</span>
            <span>Rp 105rb</span>
            <span>Rp 70rb</span>
            <span>Rp 35rb</span>
            <span>Rp 0</span>
        </div>
        <div class="chart-area">
            <div class="chart-line"></div>
        </div>
        <div class="x-axis">
            <span>08:00</span>
            <span>11:00</span>
        </div>
    </div>
</div>

<!-- Top Products Area -->
<div style="display: grid; grid-template-columns: 350px 1fr; gap: 20px; margin-bottom: 24px;">
    <!-- Left Column: Detailed Product List -->
    <div class="product-list-card">
        <div class="product-list-header">
            <span class="product-list-title">TANPA MERK</span>
            <span class="product-badge">17 Produk</span>
        </div>
        
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">ES BERAS KENCUR</span>
                <span class="product-item-count">2 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 80%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">ES KUNIR ASEM</span>
                <span class="product-item-count">2 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 80%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">AIR MINERAL 600ML</span>
                <span class="product-item-count">2 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 80%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">ES AMERICANO</span>
                <span class="product-item-count">2 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 80%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">ES BATU / AIR ES</span>
                <span class="product-item-count">2 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 80%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">JERUK</span>
                <span class="product-item-count">1 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 40%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">UDANG GORENG</span>
                <span class="product-item-count">1 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 40%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">NASI GORENG ( TERIYAKI / BLACKPAPPER )</span>
                <span class="product-item-count">1 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 40%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">AMERICANO PANAS</span>
                <span class="product-item-count">1 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 40%;"></div></div>
        </div>
        <div class="product-item">
            <div class="product-item-header">
                <span class="product-item-name">SATE AYAM</span>
                <span class="product-item-count">1 Produk</span>
            </div>
            <div class="product-item-bar-bg"><div class="product-item-bar" style="width: 40%;"></div></div>
        </div>
    </div>
    
    <div>
        <!-- Right side empty as per mockup -->
    </div>
</div>

<!-- Bottom Tables Area -->
<div class="bottom-grid">
    <!-- Penjualan Terbaru -->
    <div class="data-table-card">
        <div class="data-table-header">
            <div class="data-table-title green">
                <i class="fa-solid fa-receipt"></i> Penjualan Terbaru
            </div>
            <a href="#" class="view-all-link">Lihat semua</a>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th style="text-align: center;">Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="font-weight: 500; color: var(--text-primary);">Walk-in</div>
                        <div style="font-size: 10px; color: var(--text-secondary); margin-top: 4px;">ORD-20260910-0006 · 10 Sep</div>
                    </td>
                    <td><span class="status-badge">Selesai</span></td>
                    <td>Rp 80rb</td>
                </tr>
                <tr>
                    <td>
                        <div style="font-weight: 500; color: var(--text-primary);">Walk-in</div>
                        <div style="font-size: 10px; color: var(--text-secondary); margin-top: 4px;">ORD-20260910-0005 · 10 Sep</div>
                    </td>
                    <td><span class="status-badge">Selesai</span></td>
                    <td>Rp 27rb</td>
                </tr>
                <tr>
                    <td>
                        <div style="font-weight: 500; color: var(--text-primary);">Walk-in</div>
                        <div style="font-size: 10px; color: var(--text-secondary); margin-top: 4px;">ORD-20260910-0004 · 10 Sep</div>
                    </td>
                    <td><span class="status-badge">Selesai</span></td>
                    <td>Rp 29rb</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Stok Menipis -->
    <div class="data-table-card">
        <div class="data-table-header">
            <div class="data-table-title red">
                <i class="fa-solid fa-triangle-exclamation"></i> Stok Menipis
            </div>
            <a href="#" class="view-all-link">Lihat semua</a>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th style="text-align: center;">Stok</th>
                    <th>Min</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div style="font-weight: 500; color: var(--text-primary);">sate ayam</div>
                        <div style="font-size: 10px; color: var(--text-secondary); margin-top: 4px;">Makanan Utama</div>
                    </td>
                    <td style="color: var(--accent-red); font-weight: 600; text-align: center;">0</td>
                    <td>12</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
