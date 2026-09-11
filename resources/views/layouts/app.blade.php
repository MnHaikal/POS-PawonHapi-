<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pawon Hapi')</title>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header" style="display: flex; align-items: center; justify-content: space-between; padding: 0 16px; border-bottom: 1px solid rgba(255,255,255,0.1); height: 64px;">
                <div style="display: flex; align-items: center; gap: 12px; overflow: hidden;">
                    <div class="logo-small" style="width: 36px; height: 36px; min-width: 36px; border-radius: 50%; background-color: #fff; color: var(--bg-sidebar); display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px;">SH</div>
                    <div class="sidebar-user-info" style="display: flex; flex-direction: column; overflow: hidden; white-space: nowrap;">
                        <span style="font-size: 13px; font-weight: 600; color: #fff; text-overflow: ellipsis; overflow: hidden;">Superadmin Pawo...</span>
                        <span style="font-size: 11px; color: rgba(255, 255, 255, 0.7);">Pawon Hepi</span>
                    </div>
                </div>
                <i class="fa-solid fa-arrows-up-down sidebar-chevron" style="font-size: 10px; color: rgba(255, 255, 255, 0.7); cursor: pointer;"></i>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="/" class="menu-item {{ request()->is('/') ? 'active' : '' }}"><i class="fa-solid fa-border-all"></i> Dashboard</a></li>
                <li style="margin-top: 10px;">
                    <a href="#" class="menu-item submenu-toggle"><i class="fa-solid fa-box-open"></i> Katalog Produk <i class="fa-solid fa-chevron-down" style="margin-left: auto; font-size: 10px;"></i></a>
                    <div style="border-left: 1px solid rgba(255,255,255,0.2); margin-left: 30px; margin-top: 5px; padding-left: 5px;">
                        <a href="/produk" class="menu-item" {!! request()->is('produk') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-box"></i> Produk</a>
                        <a href="/tipe-spesial" class="menu-item" {!! request()->is('tipe-spesial') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-wand-magic-sparkles"></i> Tipe Spesial</a>
                        <a href="/cetak-barcode" class="menu-item" {!! request()->is('cetak-barcode') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-print"></i> Cetak Barcode</a>
                        <a href="/meja-kamar" class="menu-item" {!! request()->is('meja-kamar') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-utensils"></i> Meja & No Kamar</a>
                        <a href="/inventori-stok" class="menu-item" {!! request()->is('inventori-stok') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-clipboard-list"></i> Inventori & Stok</a>
                    </div>
                </li>
                <li style="margin-top: 10px;">
                    <a href="#" class="menu-item submenu-toggle" {!! request()->is('penjualan') ? 'style="background-color: rgba(255, 255, 255, 0.1);"' : '' !!}><i class="fa-solid fa-receipt"></i> Transaksi <i class="fa-solid {{ request()->is('penjualan') ? 'fa-chevron-down' : 'fa-chevron-right' }}" style="margin-left: auto; font-size: 10px;"></i></a>
                    <div style="border-left: 1px solid rgba(255,255,255,0.2); margin-left: 30px; margin-top: 5px; padding-left: 5px; {{ request()->is('penjualan') ? 'display: block;' : 'display: none;' }}">
                        <a href="/penjualan" class="menu-item" {!! request()->is('penjualan') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-file-invoice-dollar"></i> Penjualan</a>
                    </div>
                </li>
                <li><a href="#" class="menu-item"><i class="fa-solid fa-chart-line"></i> Laporan</a></li>
                <li><a href="#" class="menu-item"><i class="fa-solid fa-users-cog"></i> Operasional</a></li>
                
                <li style="margin-top: 10px;">
                    <a href="#" class="menu-item submenu-toggle" {!! (request()->is('informasi-outlet') || request()->is('pengaturan-pos') || request()->is('lisensi')) ? 'style="background-color: rgba(255, 255, 255, 0.1);"' : '' !!}><i class="fa-solid fa-gear"></i> Pengaturan <i class="fa-solid {{ (request()->is('informasi-outlet') || request()->is('pengaturan-pos') || request()->is('lisensi')) ? 'fa-chevron-down' : 'fa-chevron-right' }}" style="margin-left: auto; font-size: 10px;"></i></a>
                    <div style="border-left: 1px solid rgba(255,255,255,0.2); margin-left: 30px; margin-top: 5px; padding-left: 5px; {{ (request()->is('informasi-outlet') || request()->is('pengaturan-pos') || request()->is('lisensi')) ? 'display: block;' : 'display: none;' }}">
                        <a href="/informasi-outlet" class="menu-item" {!! request()->is('informasi-outlet') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-building"></i> Informasi Outlet</a>
                        <a href="/pengaturan-pos" class="menu-item" {!! request()->is('pengaturan-pos') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-gear"></i> Pengaturan POS</a>
                        <a href="/lisensi" class="menu-item" {!! request()->is('lisensi') ? 'style="background-color: rgba(255, 255, 255, 0.15);"' : '' !!}><i class="fa-solid fa-key"></i> Lisensi</a>
                    </div>
                </li>
            </ul>

            <div class="sidebar-footer" style="padding: 20px 0; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <a href="/login" class="menu-item" style="color: #fca5a5;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar" style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                <div class="topbar-left" style="display: flex; align-items: center; gap: 16px;">
                    <button id="sidebarToggleBtn" style="background: none; border: none; font-size: 20px; color: #fff; cursor: pointer; display: flex; align-items: center;">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="breadcrumbs" style="color: #fff; font-size: 14px; font-weight: 400; display: flex; align-items: center;">
                        @yield('breadcrumb')
                    </div>
                </div>
                <div class="topbar-right">
                    <div class="search-box" style="display: flex; align-items: center; background-color: rgba(255,255,255,0.1); padding: 6px 12px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.2);">
                        <i class="fa-solid fa-magnifying-glass" style="color: rgba(255,255,255,0.7); font-size: 12px;"></i>
                        <input type="text" placeholder="Pencari Pintar" style="background: transparent; border: none; color: #fff; margin-left: 8px; width: 120px; outline: none; font-size: 12px;">
                        <span class="shortcut-key" style="font-size: 10px; background: rgba(255,255,255,0.2); padding: 2px 6px; border-radius: 4px; color: #fff;">⌘K</span>
                    </div>
                    <button class="icon-btn" style="background: transparent; border: none; color: #fff; font-size: 16px; cursor: pointer;"><i class="fa-regular fa-envelope"></i></button>
                    <button class="icon-btn" style="background: transparent; border: none; color: #fff; font-size: 16px; cursor: pointer;"><i class="fa-regular fa-bell"></i></button>
                    <button class="profile-btn" style="display: flex; align-items: center; gap: 8px; background-color: #fff; color: var(--bg-sidebar); border-radius: 20px; padding: 6px 16px; font-size: 13px; font-weight: 600; border: none; cursor: pointer;">
                        Pawon Hepi <i class="fa-solid fa-arrows-up-down" style="font-size: 10px; color: var(--text-secondary);"></i>
                    </button>
                </div>
            </header>

            <!-- Dashboard Area -->
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Submenu Toggle Logic
            const toggles = document.querySelectorAll('.submenu-toggle');
            toggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i:last-child');
                    
                    if (!content) return;

                    if (content.style.display === 'none') {
                        content.style.display = 'block';
                        if(icon) {
                            icon.classList.remove('fa-chevron-right');
                            icon.classList.add('fa-chevron-down');
                        }
                    } else {
                        content.style.display = 'none';
                        if(icon) {
                            icon.classList.remove('fa-chevron-down');
                            icon.classList.add('fa-chevron-right');
                        }
                    }
                });
            });

            // Sidebar Toggle Logic
            const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
            const sidebar = document.getElementById('sidebar');

            if (sidebarToggleBtn && sidebar) {
                sidebarToggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                });
            }
        });
    </script>
</body>
</html>
