@extends('layouts.app')

@section('title', 'Lisensi - Pawon Hapi')

@section('breadcrumb')
    <span style="color: rgba(255,255,255,0.7);">Pengaturan</span> 
    <i class="fa-solid fa-chevron-right" style="font-size: 10px; margin: 0 12px; color: rgba(255,255,255,0.7);"></i> 
    <span style="color: #fff;">Lisensi</span>
@endsection

@section('content')
<div class="page-header" style="margin-bottom: 32px;">
    <h1 class="page-title">Lisensi Aplikasi</h1>
    <p class="page-subtitle">Informasi lisensi dan domain yang diizinkan untuk menjalankan Pawon Hepi.</p>
</div>

<div class="license-card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
        <h2 style="font-size: 16px; font-weight: 600; color: var(--text-primary);"><i class="fa-solid fa-key" style="margin-right: 8px;"></i> Pawon Hepi POS</h2>
        <span class="status-badge" style="background-color: var(--bg-sidebar); color: #fff;">Aktif</span>
    </div>
    <p class="settings-block-desc">Lisensi ini dikunci pada satu domain dan diverifikasi oleh backend.</p>
    
    <div class="license-grid">
        <div class="license-info-box">
            <div class="license-info-label">DOMAIN TERDAFTAR</div>
            <div class="license-info-value">pawonhepi.demowebjalan.com</div>
        </div>
        <div class="license-info-box">
            <div class="license-info-label">BATAS DOMAIN</div>
            <div class="license-info-value">1 Domain</div>
        </div>
        <div class="license-info-box">
            <div class="license-info-label">DOMAIN SAAT INI</div>
            <div class="license-info-value">pawonhepi.demowebjalan.com</div>
        </div>
        <div class="license-info-box">
            <div class="license-info-label">VERIFIKASI</div>
            <div class="license-info-value" style="color: #16a34a;"><i class="fa-regular fa-circle-check" style="margin-right: 4px;"></i> Tanda tangan lisensi valid</div>
        </div>
    </div>
</div>

<div class="license-alert">
    <i class="fa-solid fa-shield-halved" style="color: var(--bg-sidebar); font-size: 20px; margin-top: 2px;"></i>
    <div>
        <h3 style="font-size: 13px; font-weight: 600; color: var(--text-primary); margin-bottom: 6px;">Hanya dapat digunakan pada 1 domain</h3>
        <p style="font-size: 12px; color: var(--text-secondary); line-height: 1.5;">Aplikasi hanya dapat berjalan pada domain <strong>pawonhepi.demowebjalan.com</strong>. Jika source code dipindahkan ke domain lain, backend akan menolak akses aplikasi.</p>
    </div>
</div>
@endsection
