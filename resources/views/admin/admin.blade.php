<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-sm-4 col-md-3 col-lg-3 col-xl-2 sidebar p-4">
                <div class="navbar-brand mb-4">Al-Ukhuwwah</div>
                <ul class="nav flex-column sidebar">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('admin') ? 'active' : '' }}"
                            style="color: inherit; text-decoration: none;">
                            <i class="bi bi-house-fill"></i>
                            <span class="ms-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('adminLayanan') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('adminLayanan') ? 'active' : '' }}"
                            style="color: inherit; text-decoration: none;">
                            <i class="bi bi-info-circle"></i>
                            <span class="ms-2">Data Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2 dropdown">
                        <a href="#"
                            class="nav-link decoration-none d-flex align-items-center dropdown-toggle {{ request()->routeIs('adminPengumuman', 'adminJadwalKajian', 'adminJadwalJumat', 'adminAgenda') ? 'active' : '' }}"
                            id="dropdownKegiatan" data-toggle="collapse" aria-expanded="false"
                            style="color: inherit; text-decoration: none;">
                            <i class="bi bi-calendar-event-fill"></i>
                            <span class="ms-2">Data Kegiatan</span>
                        </a>
                        <ul class="collapse list-unstyled ms-4" style="position: static; display: none; padding-left: 0;">
                            <li class="nav-item mb-2">
                                <a class="dropdown-item d-flex py-1 align-items-center" href="{{ route('adminPengumuman') }}">
                                    <span class="ms-3">Pengumuman</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="dropdown-item d-flex py-1 align-items-center"
                                    href="{{ route('adminJadwalKajian') }}">
                                    <span class="ms-3">Jadwal Kajian</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="dropdown-item d-flex py-1 align-items-center"
                                    href="{{ route('adminJadwalJumat') }}">
                                    <span class="ms-3">Jadwal Jumat</span>
                                </a>
                            </li>
                            <li class="nav-item mb-2">
                                <a class="dropdown-item d-flex py-1 align-items-center" href="{{ route('adminAgenda') }}">
                                    <span class="ms-3">Agenda</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('adminLaporan') }}"
                            class="nav-link d-flex align-items-center {{ request()->routeIs('adminLaporan') ? 'active' : '' }}"
                            style="color: inherit; text-decoration: none;">
                            <i class="bi bi-journal-text"></i>
                            <span class="ms-2">Laporan Keuangan</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-sm-8 ms-md-5 col-lg-8 ms-xl-auto col-xl-10 content">
                @yield('data')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('dropdownKegiatan').addEventListener('click', function (e) {
            e.preventDefault();
            const dropdownMenu = this.nextElementSibling;
            const isShown = dropdownMenu.style.display === 'block';
            dropdownMenu.style.display = isShown ? 'none' : 'block';
        });

    </script>
</body>

</html>
