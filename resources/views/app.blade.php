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
    <style>
        body {
            background-color: #1B2421;
            font-family: "Jost", sans-serif;
            color: #FBFADA;
            height: 100vh;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
        }

        .layanan {
            background-color: #2A332E;
            border: 1px solid;
            border-color: #FBFADA;
            color: #FBFADA;
            margin-right: 5px;
        }

        .fasilitas {
            background-color: #2A332E;
            border: 1px solid;
            border-color: #FBFADA;
            color: #FBFADA;
            margin-right: 5px;
        }

        .nav-btn {
            text-decoration: none;
            flex-grow: 1;
            color: #FBFADA;
            display: block;
        }

        .nav-btn div {
            background-color: #2A332E;
            text-align: center;
            padding: 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease-in-out;
        }

        .nav-btn:hover div {
            background-color: #FBFADA;
            color: #2A332E;
        }

        .nav-btn.active div {
            background-color: #FBFADA;
            color: #2A332E;
            font-weight: bold;
            padding-left: 0;
            padding-right: 0;
        }

        .laporan {
            --bs-table-striped-bg: #444e45;
        }

        .laporan>tbody>tr>td {
            background-color: #374139;
            color: #FBFADA;
            font-size: 10pt;
        }

        .laporan>thead>tr>th {
            background-color: #374139;
            color: #FBFADA;
            font-size: 10pt;
        }

        .lap-page .page-link {
            background-color: var(--pagination-bg, #374139);
            color: var(--pagination-color, #FBFADA);
            border-color: var(--pagination-bg, #374139);
            transition: background-color 0.3s, color 0.3s;
        }

        .lap-page .page-link:hover {
            background-color: darken(var(--pagination-bg, #374139), 10%);
            color: var(--pagination-color-hover, #FFFFFF);
        }

        .lap-page .page-item.active .page-link {
            background-color: var(--pagination-active-bg, #adbc9f);
            color: var(--pagination-active-color, #FFFFFF);
            border-color: var(--pagination-active-bg, #adbc9f);
            font-weight: bold;
            border-radius: 15%;
        }

        .lap-page .page-item.active .page-link:hover {
            background-color: var(--pagination-active-bg, #FBFADA);
            color: var(--pagination-active-color, #000000);
        }

        table.laporan td,
        table.laporan th {
            padding-left: 20px !important;
        }

        #entries-select {
            background-color: #FBFADA;
            color: #374139;
            border: none;
        }

        .input-group .form-control {
            background-color: #FBFADA;
            color: #374139;
            border: none;
        }

        .input-group .form-control::placeholder {
            color: #6b6b6b;
        }

        .input-group .input-group-text {
            background-color: #FBFADA;
            color: #374139;
            border: none;
        }

    </style>
</head>

<body class="container-fluid p-2">
    <div class="rounded py-3 px-4 d-flex justify-content-between align-items-center"
        style="background-color: #2A332E; height: 10vh">
        <div class="d-flex flex-row align-items-center gap-2">
            <img src="{{ asset('image/logo.svg') }}" alt="logo" style="width: 15px; height: 15px;">
            <span style="font-size: 15px;">Al-Ukhuwwah</span>
        </div>
        <span style="font-size: 15px;">Bandung | 08:02</span>
    </div>
    @yield('content')

    <!-- Card Kanan -->
    <div class="col-sm-4 d-flex flex-column justify-content-between h-100">
        <div class="card mb-2 h-50" style="background-color: #2A332E;">
            <div class="card-body"></div>
        </div>
        <div class="card h-50" style="background-color: #2A332E;">
            <div class="card-body"></div>
        </div>
    </div>
    </div>

    <!-- Bagian Navigasi Bawah -->
    <div class="d-flex justify-content-between align-items-center mt-1 gap-2 rounded" style="height: 10vh;">
        <a href="{{ route('home') }}" class="nav-btn {{ Route::is('home') ? 'active' : '' }}">
            <div>
                <i class="bi bi-house-fill"></i>
                @unless(Route::is('home'))
                Beranda
                @endunless
            </div>
        </a>
        <a href="{{ route('kegiatan') }}" class="nav-btn {{ Route::is('kegiatan') ? 'active' : '' }}">
            <div>
                <i class="bi bi-calendar-event-fill"></i>
                @unless(Route::is('kegiatan'))
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

    <div class="rounded mt-1 p-1" style="background-color: #2A332E; height: 5vh">
        <div class="col text-center">
            <span>Copyright © Al-Ukhuwwah 2024</span>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
