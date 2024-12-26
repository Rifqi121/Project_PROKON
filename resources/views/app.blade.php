<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body class="container-fluid p-1">
    <div class="rounded py-3 px-4 d-flex justify-content-between align-items-center"
        style="background-color: #2A332E; height: 8vh">
        <div class="d-flex flex-row align-items-center gap-2">
            <img src="{{ asset('image/logo.svg') }}" alt="logo" style="width: 15px; height: 15px;">
            <span style="font-size: 15px;">Al-Ukhuwwah</span>
        </div>
        <span class="d-none d-md-block" style="font-size: 15px;">Bandung | 08:02</span>
        <button id="sidebarToggle" class="btn d-md-none border border-dark" data-bs-toggle="offcanvas"
            data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <!-- main content -->
    <main class="row mt-1 main-content">
        <div class="col-12 col-md-8 pe-md-0 custom-height">
            @yield('content')
        </div>

        <!-- Card Kanan -->
        <div class="col-12 col-md-4 d-flex flex-row flex-md-column gap-1 card-content">
            <div class="card flex-fill" style="background-color: #2A332E;">
                <div class="card-body"></div>
            </div>
            <div class="card flex-fill" style="background-color: #2A332E;">
                <div class="card-body"></div>
            </div>
        </div>
    </main>



    <!-- Bagian Navigasi Bawah -->
    <div class="d-none d-md-flex justify-content-between align-items-center mt-1 gap-1 rounded" style="height: 10vh;">
        <a href="{{ route('home') }}" class="nav-btn {{ Route::is('home') ? 'active' : '' }}">
            <div>
                <i class="bi bi-house-fill"></i>
                @unless(Route::is('home'))
                Beranda
                @endunless
            </div>
        </a>
        <a href="{{ route('kegiatan') }}"
            class="nav-btn {{ Route::is('kegiatan','pengumuman', 'agenda', 'jadwaljumat', 'jadwalkajian') ? 'active' : '' }}">
            <div>
                <i class="bi bi-calendar-event-fill"></i>
                @unless(Route::is('kegiatan','pengumuman', 'agenda', 'jadwaljumat', 'jadwalkajian'))
                Kegiatan
                @endunless
            </div>
        </a>
        <a href="{{ route('laporan') }}" class="nav-btn {{ Route::is('laporan') ? 'active' : '' }}">
            <div>
                <i class="bi bi-journal-text"></i>
                @unless(Route::is('laporan'))
                Laporan
                @endunless
            </div>
        </a>
        <a href="{{ route('shodaqoh') }}" class="nav-btn {{ Route::is('shodaqoh') ? 'active' : '' }}">
            <div>
                <i class="bi bi-cash"></i>
                @unless(Route::is('shodaqoh'))
                Shodaqoh
                @endunless
            </div>
        </a>
        <a href="{{ route('jadwalsholat') }}" class="nav-btn {{ Route::is('jadwalsholat') ? 'active' : '' }}">
            <div>
                <i class="bi bi-clock-fill"></i>
                @unless(Route::is('jadwalsholat'))
                Jadwal Sholat
                @endunless
            </div>
        </a>
    </div>

    <div class="rounded mt-1 p-1" style="background-color: #2A332E;">
        <div class="col text-center">
            <span>Copyright © Al-Ukhuwwah 2024</span>
        </div>
    </div>

    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Menu Navigasi</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <!-- Menu Navigasi Sidebar -->
            <nav class="nav flex-column">
                <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'fw-bold' : '' }}">
                    <i class="bi bi-house-fill"></i> Beranda
                </a>
                <a href="{{ route('kegiatan') }}"
                    class="nav-link {{ Route::is('kegiatan', 'pengumuman', 'agenda', 'jadwaljumat', 'jadwalkajian') ? 'fw-bold' : '' }}">
                    <i class="bi bi-calendar-event-fill"></i> Kegiatan
                </a>
                <a href="{{ route('laporan') }}" class="nav-link {{ Route::is('laporan') ? 'fw-bold' : '' }}">
                    <i class="bi bi-journal-text"></i> Laporan
                </a>
                <a href="{{ route('shodaqoh') }}" class="nav-link {{ Route::is('shodaqoh') ? 'fw-bold' : '' }}">
                    <i class="bi bi-cash"></i> Shodaqoh
                </a>
                <a href="{{ route('jadwalsholat') }}" class="nav-link {{ Route::is('jadwalsholat') ? 'fw-bold' : '' }}">
                    <i class="bi bi-clock-fill"></i> Jadwal Sholat
                </a>
            </nav>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
