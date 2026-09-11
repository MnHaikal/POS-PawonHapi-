@extends('layouts.app')

@section('title', 'Meja & Kamar Kost - Pawon Hapi')

@section('content')
<!-- Page Header -->
<div class="page-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h1 class="page-title">Meja & Kamar Kost</h1>
        <p class="page-subtitle">Kelola meja & kamar kost beserta QR code untuk pemesanan mandiri oleh pelanggan</p>
    </div>
    <div class="page-actions">
        <button class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Meja</button>
    </div>
</div>

<!-- Toggle Pills -->
<div class="toggle-group">
    <button class="toggle-btn active">Meja</button>
    <button class="toggle-btn">Kamar Kost</button>
</div>

<!-- Toolbar -->
<div class="toolbar" style="margin-bottom: 20px;">
    <div class="search-input-wrapper" style="width: 350px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari nama meja...">
    </div>
</div>

<!-- Data Table -->
<div class="table-card">
    <table class="data-table-large">
        <thead>
            <tr>
                <th>Meja</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            $mejas = ['Meja 1', 'Meja 11', 'Meja 2', 'Meja 3', 'Meja 4', 'Meja 5', 'Meja 6', 'Meja 7', 'Meja 8', 'Meja 9'];
            @endphp
            
            @foreach($mejas as $meja)
            <tr>
                <td style="font-weight: 500;">{{ $meja }}</td>
                <td>
                    <span class="status-badge" style="background-color: var(--bg-sidebar); color: #fff;">Aktif</span>
                </td>
                <td>
                    <div class="action-icons">
                        <i class="fa-solid fa-qrcode"></i>
                        <i class="fa-solid fa-pen"></i>
                        <i class="fa-solid fa-trash-can text-red"></i>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="table-footer">
        <span>Per halaman: </span>
        <select>
            <option>20</option>
            <option>50</option>
            <option>100</option>
        </select>
        <span style="margin-left: 12px;">1-10 dari 10</span>
    </div>
</div>
@endsection
