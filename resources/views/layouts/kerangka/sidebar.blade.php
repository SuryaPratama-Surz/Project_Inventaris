<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTARIS</title>
    <link rel="icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('frontend/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('frontend/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('frontend/css/demo.css') }}" />
</head>
<body>
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="light-theme">
            <a href="{{ route('welcome') }}" class="text-white navbar-brand d-flex justify-content-center align-items-center" style="padding: 10px;">
                <img src="{{ asset('assets/images/logowhite.png') }}" alt="Logo" class="img-fluid" style="max-height: 55px; margin-top: 10px; margin-right: 25px;">
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
              <a
                href="{{ route('welcome') }}"
                class="collapsed"
                aria-expanded="false"
              >
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
              </li>
              <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Lainnya</h4>
              </li>
              @if (Auth::user()->is_admin === 1)  
              <li class="nav-item {{ request()->routeIs('pengguna.index') ? 'active' : '' }}">
              <a href="{{ route('pengguna.index') }}">
                <i class="fas fa-address-card"></i>
                <p>Data Petugas</p>
                <span class=""></span>
              </a>
              </li>
              <li class="nav-item {{ request()->routeIs('barang.index') ? 'active' : '' }}">
                <a href="{{ route('barang.index') }}">
                  <i class="fas fa-dolly-flatbed"></i>
                  <p>Data Barang</p>
                  <span class=""></span>
                </a>
              </li>
              <li class="nav-item {{ request()->routeIs('barangmasuk.index') ? 'active' : '' }}">
                <a href="{{ route('barangmasuk.index') }}">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Data Barang Masuk</p>
                  <span class=""></span>
                </a>
              </li>
              <li class="nav-item {{ request()->routeIs('barangkeluar.index') ? 'active' : '' }}">
                <a href="{{ route('barangkeluar.index') }}">
                  <i class="fas fa-arrow-circle-left"></i>
                  <p>Data Barang Keluar</p>
                  <span class=""></span>
                </a>
              </li>
              <li class="nav-item {{ request()->routeIs('peminjaman.index') ? 'active' : '' }}">
                <a href="{{ route('peminjaman.index') }}">
                  <i class="fas fa-hand-holding"></i>
                   <p>Data Peminjaman</p>
                   <span class=""></span>
                  </i>
                </a>
              </li> 
              <li class="nav-item {{ request()->routeIs('pengembalian.index') ? 'active' : '' }}">
                <a href="{{ route('pengembalian.index') }}">
                  <i class="fas fa-clipboard-check"></i>
                   <p>Data Pengembalian</p>
                   <span class=""></span>
                  </i>
                </a>
              </li> 
              @endif
              {{-- <li class="nav-item {{ request()->routeIs('barang.index') ? 'active' : '' }}">
              <a href="{{ route('barang.index') }}">
                <i class="fas fa-box"></i>
                <p>Data Barang</p>
              </a>
              </li> --}}
            </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>