@extends('layouts.app')

@section('title', 'Pengaturan POS - Pawon Hapi')

@section('content')
<div class="page-header" style="margin-bottom: 24px;">
    <h1 class="page-title">Pengaturan POS</h1>
    <p class="page-subtitle">Konfigurasi kasir, struk, keamanan, dan operasional.</p>
</div>

<div class="side-menu-layout">
    <div class="side-nav">
        <a href="#" class="side-nav-item active"><i class="fa-regular fa-credit-card"></i> Pembayaran</a>
        <a href="#" class="side-nav-item"><i class="fa-solid fa-sliders"></i> POS Ext. Settings</a>
        <a href="#" class="side-nav-item"><i class="fa-regular fa-bell"></i> POS Antrian</a>
        <a href="#" class="side-nav-item"><i class="fa-regular fa-message"></i> Notifikasi</a>
    </div>
    
    <div class="side-content">
        <div class="settings-block">
            <h2 class="settings-block-title">Biaya Kemasan Take Away</h2>
            <p class="settings-block-desc">Ditambahkan otomatis per item ke total pesanan saat pelanggan memilih Take Away.</p>
            
            <div class="form-group" style="width: 300px; margin-bottom: 16px;">
                <label style="display: block; font-size: 12px; font-weight: 600; margin-bottom: 8px;">Biaya per item (Rp)</label>
                <input type="text" class="form-control" value="Rp 0">
            </div>
            
            <button class="btn btn-primary" style="padding: 8px 16px;">Simpan Pengaturan</button>
        </div>

        <div class="settings-block">
            <h2 class="settings-block-title">Metode Pembayaran</h2>
            <p class="settings-block-desc">Metode pembayaran yang tersedia di kasir.</p>
            
            <table class="data-table-large" style="margin-bottom: 16px;">
                <thead>
                    <tr>
                        <th style="width: 30%;">Nama</th>
                        <th style="width: 30%;">Tipe</th>
                        <th style="width: 20%;">Aktif</th>
                        <th style="width: 20%;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 500;">Cash</td>
                        <td><span class="badge-gray-pill">Tunai</span></td>
                        <td>
                            <div class="toggle-switch"></div>
                        </td>
                        <td>
                            <div class="action-icons" style="justify-content: flex-start;">
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash-can text-red"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 500;">QRIS</td>
                        <td><span class="badge-gray-pill">QRIS</span></td>
                        <td>
                            <div class="toggle-switch"></div>
                        </td>
                        <td>
                            <div class="action-icons" style="justify-content: flex-start;">
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash-can text-red"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: 500;">BCA</td>
                        <td><span class="badge-gray-pill">Debit</span></td>
                        <td>
                            <div class="toggle-switch"></div>
                        </td>
                        <td>
                            <div class="action-icons" style="justify-content: flex-start;">
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-trash-can text-red"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <button class="btn" style="padding: 6px 12px; font-size: 12px;"><i class="fa-solid fa-plus"></i> Tambahkan Cara Pembayaran</button>
        </div>
    </div>
</div>
@endsection
