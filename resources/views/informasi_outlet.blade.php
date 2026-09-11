@extends('layouts.app')

@section('title', 'Informasi Outlet - Pawon Hapi')

@section('content')
<div class="settings-section">
    <div class="page-header" style="margin-bottom: 24px;">
        <h1 class="page-title">Informasi Outlet</h1>
        <p class="page-subtitle">Perbarui nama dan detail outlet</p>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label>Logo Outlet</label>
        <div class="logo-upload-area">
            <img src="https://via.placeholder.com/64" alt="Logo" class="logo-preview">
            <div>
                <button class="btn" style="padding: 6px 12px; margin-bottom: 4px;"><i class="fa-solid fa-upload"></i> Pilih Foto</button>
                <div style="font-size: 10px; color: var(--text-secondary);">JPG, PNG, WEBP maks. 2MB</div>
            </div>
        </div>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label>Nama Outlet</label>
        <input type="text" class="form-control" value="Pawon Hepi">
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <label>Alamat</label>
        <input type="text" class="form-control" value="Jl. Kaliurang KM 14 Gg Banteng Tegalsari Umbulmartani, Sleman, Yogyakarta">
    </div>

    <div class="form-row" style="margin-bottom: 20px;">
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" value="081234567890">
        </div>
        <div class="form-group">
            <label>Email Outlet</label>
            <input type="email" class="form-control" value="info@pawonhapi.com">
        </div>
    </div>

    <div class="form-group" style="margin-bottom: 24px;">
        <label>Nomor Pajak (NPWP)</label>
        <input type="text" class="form-control" value="00.000.000.0-000.000">
    </div>

    <button class="btn btn-primary" style="padding: 8px 24px;">Simpan</button>
</div>

<div class="settings-section">
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div>
            <h2 class="page-title" style="font-size: 14px;">Anggota Outlet</h2>
            <p class="page-subtitle" style="font-size: 11px;">Kelola siapa yang tergabung dalam outlet ini</p>
        </div>
        <button class="btn btn-primary" style="padding: 6px 16px;"><i class="fa-solid fa-plus"></i> Tambah Anggota</button>
    </div>

    <div class="member-list">
        <!-- Superadmin -->
        <div class="member-card">
            <div class="member-info-wrapper">
                <div class="member-avatar">SH</div>
                <div class="member-details">
                    <span class="member-name">Superadmin Pawon Hepi</span>
                    <span class="member-email">superadmin@pawonhepi.com</span>
                </div>
            </div>
            <div class="member-actions">
                <i class="fa-solid fa-pen" style="color: var(--text-secondary); cursor: pointer; font-size: 12px;"></i>
                <span class="member-role">Super Admin</span>
                <i class="fa-solid fa-xmark" style="color: var(--text-secondary); cursor: pointer;"></i>
            </div>
        </div>

        <!-- Kasir -->
        <div class="member-card">
            <div class="member-info-wrapper">
                <div class="member-avatar">KH</div>
                <div class="member-details">
                    <span class="member-name">Kasir Pawon Hepi</span>
                    <span class="member-email">pos.senior@pawonhepi.com</span>
                </div>
            </div>
            <div class="member-actions">
                <i class="fa-solid fa-pen" style="color: var(--text-secondary); cursor: pointer; font-size: 12px;"></i>
                <span class="member-role">Staff POS Senior</span>
                <i class="fa-solid fa-xmark" style="color: var(--text-secondary); cursor: pointer;"></i>
            </div>
        </div>

        <!-- SPV -->
        <div class="member-card">
            <div class="member-info-wrapper">
                <div class="member-avatar">s</div>
                <div class="member-details">
                    <span class="member-name">spv</span>
                    <span class="member-email">spv@pawonhepi.com</span>
                </div>
            </div>
            <div class="member-actions">
                <i class="fa-solid fa-pen" style="color: var(--text-secondary); cursor: pointer; font-size: 12px;"></i>
                <span class="member-role">Supervisor</span>
                <i class="fa-solid fa-xmark" style="color: var(--text-secondary); cursor: pointer;"></i>
            </div>
        </div>

        <!-- Staff -->
        <div class="member-card">
            <div class="member-info-wrapper">
                <div class="member-avatar">s</div>
                <div class="member-details">
                    <span class="member-name">staff</span>
                    <span class="member-email">staff@pawonhepi.com</span>
                </div>
            </div>
            <div class="member-actions">
                <i class="fa-solid fa-pen" style="color: var(--text-secondary); cursor: pointer; font-size: 12px;"></i>
                <span class="member-role">Staff</span>
                <i class="fa-solid fa-xmark" style="color: var(--text-secondary); cursor: pointer;"></i>
            </div>
        </div>
    </div>
</div>
@endsection
