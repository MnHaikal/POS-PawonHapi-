@extends('layouts.app')

@section('title', 'Cetak Barcode - Pawon Hapi')

@section('content')
<div class="split-layout">
    <!-- Left Pane: Pilih Produk -->
    <div class="split-pane">
        <div class="pane-header">
            <span class="pane-title">Pilih Produk</span>
            <div style="display: flex; gap: 8px;">
                <button class="btn" style="padding: 4px 12px; font-size: 12px; border-radius: 16px;">Semua</button>
                <button class="btn" style="padding: 4px 12px; font-size: 12px; border-radius: 16px;">Reset</button>
            </div>
        </div>
        <div class="pane-content" style="padding-top: 12px;">
            <div class="search-product-box">
                <div class="search-input-wrapper" style="width: 100%;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Cari nama, SKU, barcode...">
                </div>
            </div>
            
            <ul class="product-select-list">
                @php
                $products = [
                    ['Air Mineral 600ml', 'Rp 4.000'],
                    ['Americano Panas', 'Rp 13.000'],
                    ['Ayam Crispy Mini', 'Rp 10.000'],
                    ['Ayam Geprek + Nasi', 'Rp 12.000'],
                    ['Ayam Geprek Bakar + Nasi', 'Rp 14.000'],
                    ['Ayam Goreng Bawang "Paha Atas" + Nasi', 'Rp 17.000'],
                    ['Ayam goreng Bawang "SAYAP" + Nasi', 'Rp 14.000'],
                    ['Beef Slice + Nasi', 'Rp 22.000'],
                    ['Butter Coffe', 'Rp 15.000'],
                    ['Butterscotch Latte', 'Rp 18.000'],
                    ['Cah Jamur', 'Rp 10.000'],
                    ['Cah Kangkung', 'Rp 7.000'],
                    ['Cah Toge', 'Rp 8.000'],
                    ['Cappucino Panas', 'Rp 16.000'],
                    ['Ceker Tanpa Tulang + Nasi', 'Rp 16.000'],
                    ['Ceker Tanpa Tulang Crispy', 'Rp 10.000'],
                    ['Daging Ayam + Nasi', 'Rp 17.000'],
                    ['Daging Sapi + Nasi', 'Rp 27.000'],
                    ['Dengkul Ayam + Nasi', 'Rp 15.000'],
                    ['Empal gepuk + Nasi', 'Rp 30.000'],
                ];
                @endphp
                
                @foreach($products as $product)
                <li class="product-select-item">
                    <div class="product-select-info">
                        <input type="checkbox" style="width: 16px; height: 16px; border-radius: 4px; cursor: pointer;">
                        <span>{{ $product[0] }}</span>
                    </div>
                    <span class="product-select-price">{{ $product[1] }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Right Pane: Konfigurasi Label -->
    <div class="split-pane">
        <div class="pane-header">
            <span class="pane-title">Konfigurasi Label</span>
            <button class="btn btn-primary" style="padding: 6px 16px; font-size: 12px; border-radius: 8px; background-color: #64748b; border-color: #64748b;"><i class="fa-solid fa-print"></i> Cetak</button>
        </div>
        <div class="pane-content" style="background-color: #fafaf9;">
            
            <div class="config-section">
                <label class="config-label" style="font-size: 11px; color: var(--text-secondary);">PREVIEW LABEL — AIR MINERAL 600ML</label>
                <div class="preview-label-box">
                    <div>Air Mineral 600ml</div>
                    <div style="font-size: 24px;"><i class="fa-solid fa-barcode"></i></div>
                    <div>Rp 4.000</div>
                </div>
            </div>

            <div class="config-section">
                <label class="config-label">Barcode</label>
                <div class="form-row">
                    <div class="form-group">
                        <label>Tipe Barcode</label>
                        <select class="form-control">
                            <option>Code 128 (universal)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data Barcode</label>
                        <select class="form-control">
                            <option>Gunakan SKU</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="config-section">
                <label class="config-label">Ukuran Label</label>
                <div class="form-row" style="margin-bottom: 0;">
                    <div class="form-group">
                        <label>Lebar (mm)</label>
                        <input type="number" class="form-control" value="50">
                    </div>
                    <div class="form-group">
                        <label>Tinggi (mm)</label>
                        <input type="number" class="form-control" value="30">
                    </div>
                </div>
                <div class="pill-group">
                    <span class="pill active">50×30 mm</span>
                    <span class="pill">60×40 mm</span>
                    <span class="pill">40×25 mm</span>
                    <span class="pill">70×50 mm</span>
                    <span class="pill">100×60 mm</span>
                </div>
            </div>

            <div class="config-section" style="border-top: 1px solid var(--border-color); padding-top: 24px;">
                <label class="config-label">Konten Label</label>
                
                <div class="config-list-item">
                    <span>Gambar Barcode / QR</span>
                    <div class="toggle-switch"></div>
                </div>
                <div class="config-list-item">
                    <span>Nama Produk</span>
                    <div class="toggle-switch"></div>
                </div>
                <div class="config-list-item">
                    <span>Harga Jual</span>
                    <div class="toggle-switch"></div>
                </div>
                <div class="config-list-item">
                    <span>Nomor Barcode / SKU (teks)</span>
                    <div class="toggle-switch"></div>
                </div>
                <div class="config-list-item">
                    <span>SKU (teks terpisah)</span>
                    <div class="toggle-switch"></div>
                </div>
                <div class="config-list-item">
                    <span>Tampilkan border</span>
                    <div class="toggle-switch"></div>
                </div>
                
                <div class="form-group" style="margin-top: 12px;">
                    <label style="font-size: 13px; font-weight: 500; color: var(--text-primary);">Teks Custom (opsional)</label>
                    <input type="text" class="form-control" placeholder="mis. Garansi 1 Tahun">
                </div>
            </div>

            <div class="config-section" style="border-top: 1px solid var(--border-color); padding-top: 24px;">
                <label class="config-label">Ukuran Font (pt)</label>
                <div class="form-row">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="number" class="form-control" value="8">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" value="10">
                    </div>
                    <div class="form-group">
                        <label>Info / SKU</label>
                        <input type="number" class="form-control" value="7">
                    </div>
                </div>
            </div>
            
            <div style="border-top: 1px solid var(--border-color); padding-top: 24px; font-size: 12px; color: var(--text-secondary); cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-xmark"></i> Reset ke default
            </div>
        </div>
    </div>
</div>
@endsection
