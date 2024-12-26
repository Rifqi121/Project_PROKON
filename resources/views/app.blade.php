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
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
</head>

<body class="container-fluid p-1">
    <div class="rounded py-3 px-4 d-flex justify-content-between align-items-center"
        style="background-color: #2A332E; height: 8vh">
        <div class="d-flex flex-row align-items-center gap-2">
            <img src="{{ asset('image/logo.svg') }}" alt="logo" style="width: 15px; height: 15px;">
            <span style="font-size: 15px;">Al-Ukhuwwah</span>
        </div>
        <span id="current-time" class="d-none d-md-block" style="font-size: 15px;">Bandung | 08:02</span>
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
                <div class="card-body">
                    <div class="datepicker">
                        <div class="datepicker-calendar" id="calendar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card flex-fill" style="background-color: #2A332E;">
                <div class="card-body d-flex flex-column gap-5 mx-3">
                    <div>
                        <?php
                        use Illuminate\Support\Facades\Http;
                        
                        $tanggal = now()->format('Y-m-d'); // Tanggal hari ini
                        $hijriDate = '';
                        $gregorianDate = now()->locale('id')->isoFormat('D MMMM YYYY'); // Format tanggal Gregorian
                        
                        try {
                            $apiUrlHijri = "https://api.myquran.com/v2/cal/hijr/{$tanggal}/-1";
                            $responseHijri = Http::get($apiUrlHijri);
                            $hijriData = $responseHijri->json('data.date') ?? [];
                            $hijriDate = $hijriData[1] ?? 'Tanggal Hijriyah tidak tersedia'; // Data Hijriyah
                        } catch (\Exception $e) {
                            $hijriDate = 'Tanggal Hijriyah tidak tersedia';
                        }
                        ?>

                        <h5 class="card-title pb-2" style="color: #FBFADA" id="gregorian-date">
                            <?= $gregorianDate ?>
                        </h5>
                        <h6 class="card-title pb-2" style="color: #FBFADA" id="hijri-date">
                            <?= $hijriDate ?>
                        </h6>
                    </div>

                    <?php
                    $kota = '1201'; // Ganti dengan nama kota
                    $apiUrlSholat = "https://api.myquran.com/v2/sholat/jadwal/{$kota}/{$tanggal}";
                    $jadwalSholat = [];
                    
                    try {
                        $responseSholat = Http::get($apiUrlSholat);
                        $jadwalSholat = $responseSholat->json('data.jadwal') ?? [];
                    } catch (\Exception $e) {
                        $jadwalSholat = [];
                    }
                    ?>

                    @if (!empty($jadwalSholat))
                        <div class="d-flex flex-column gap-3">
                            <h6 style="color: #FBFADA">Jadwal Sholat Hari Ini</h6>
                            <div class="d-flex justify-content-between" style="color: #FBFADA">
                                <div class="d-flex flex-column text-center">
                                    <p>Subuh</p>
                                    <p>{{ $jadwalSholat['subuh'] }}</p>
                                </div>
                                <div class="d-flex flex-column text-center">
                                    <p>Dzuhur</p>
                                    <p>{{ $jadwalSholat['dzuhur'] }}</p>
                                </div>
                                <div class="d-flex flex-column text-center">
                                    <p>Ashar</p>
                                    <p>{{ $jadwalSholat['ashar'] }}</p>
                                </div>
                                <div class="d-flex flex-column text-center">
                                    <p>Maghrib</p>
                                    <p>{{ $jadwalSholat['maghrib'] }}</p>
                                </div>
                                <div class="d-flex flex-column text-center">
                                    <p>Isya</p>
                                    <p>{{ $jadwalSholat['isya'] }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center">Jadwal tidak tersedia</p>
                    @endif
                </div>
            </div>

        </div>
    </main>



    <!-- Bagian Navigasi Bawah -->
    <div class="d-none d-md-flex justify-content-between align-items-center mt-1 gap-1 rounded" style="height: 10vh;">
        <a href="{{ route('home') }}" class="nav-btn {{ Route::is('home') ? 'active' : '' }}">
            <div>
                <i class="bi bi-house-fill"></i>
                @unless (Route::is('home'))
                    Beranda
                @endunless
            </div>
        </a>
        <a href="{{ route('kegiatan') }}"
            class="nav-btn {{ Route::is('kegiatan', 'pengumuman', 'agenda', 'jadwaljumat', 'jadwalkajian') ? 'active' : '' }}">
            <div>
                <i class="bi bi-calendar-event-fill"></i>
                @unless (Route::is('kegiatan', 'pengumuman', 'agenda', 'jadwaljumat', 'jadwalkajian'))
                    Kegiatan
                @endunless
            </div>
        </a>
        <a href="{{ route('user.laporan') }}" class="nav-btn {{ Route::is('user.laporan') ? 'active' : '' }}">
            <div>
                <i class="bi bi-journal-text"></i>
                @unless (Route::is('laporan'))
                    Laporan
                @endunless
            </div>
        </a>
        <a href="{{ route('shodaqoh') }}" class="nav-btn {{ Route::is('shodaqoh') ? 'active' : '' }}">
            <div>
                <i class="bi bi-cash"></i>
                @unless (Route::is('shodaqoh'))
                    Shodaqoh
                @endunless
            </div>
        </a>
        <a href="{{ route('jadwalsholat') }}" class="nav-btn {{ Route::is('jadwalsholat') ? 'active' : '' }}">
            <div>
                <i class="bi bi-clock-fill"></i>
                @unless (Route::is('jadwalsholat'))
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
                <a href="{{ route('user.laporan') }}"
                    class="nav-link {{ Route::is('user.laporan') ? 'fw-bold' : '' }}">
                    <i class="bi bi-journal-text"></i> Laporan
                </a>
                <a href="{{ route('shodaqoh') }}" class="nav-link {{ Route::is('shodaqoh') ? 'fw-bold' : '' }}">
                    <i class="bi bi-cash"></i> Shodaqoh
                </a>
                <a href="{{ route('jadwalsholat') }}"
                    class="nav-link {{ Route::is('jadwalsholat') ? 'fw-bold' : '' }}">
                    <i class="bi bi-clock-fill"></i> Jadwal Sholat
                </a>
            </nav>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function createCalendar(containerId) {
            const container = document.getElementById(containerId);
            const today = new Date();
            const currentYear = today.getFullYear();
            const currentMonth = today.getMonth();

            // Days of the week
            const daysOfWeek = ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"];
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate(); // Days in the current month
            const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // Day index of the first day

            const prevMonthDays = new Date(currentYear, currentMonth, 0).getDate(); // Days in the previous month

            // Render days of the week
            daysOfWeek.forEach((day) => {
                const dayElem = document.createElement("span");
                dayElem.className = "day";
                dayElem.textContent = day;
                container.appendChild(dayElem);
            });

            // Render dates
            const totalCells = 42; // 6 rows * 7 columns
            const daysBefore = (firstDay + 6) % 7; // Adjust to start from Monday
            let dayCount = 1;

            for (let i = 0; i < totalCells; i++) {
                const dateElem = document.createElement("button");
                dateElem.className = "date";

                if (i < daysBefore) {
                    // Previous month dates
                    dateElem.textContent = prevMonthDays - daysBefore + i + 1;
                    dateElem.classList.add("faded");
                } else if (dayCount <= daysInMonth) {
                    // Current month dates
                    dateElem.textContent = dayCount;

                    if (
                        dayCount === today.getDate() &&
                        currentMonth === today.getMonth() &&
                        currentYear === today.getFullYear()
                    ) {
                        dateElem.classList.add("current-day");
                    }

                    dayCount++;
                } else {
                    // Next month dates
                    dateElem.textContent = i - daysBefore - daysInMonth + 1;
                    dateElem.classList.add("faded");
                }

                container.appendChild(dateElem);
            }
        }

        // Call the function to create the calendar
        createCalendar("calendar");
    </script>
    <script>
        async function getDates() {
            const gregorianDate = new Date(); // Mendapatkan tanggal Gregorian saat ini
            const gregorianDateFormatted =
                `${gregorianDate.getDate()} ${gregorianDate.toLocaleString('default', { month: 'long' })} ${gregorianDate.getFullYear()}`;

            // Mengambil tanggal Hijriyah dari API MyQuran
            const apiUrl = 'https://api.myquran.com/v2/cal/hijr/?adj=-1';
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();
                if (data.status === "success") {
                    // Ambil hasil tanggal Hijriyah
                    const hijriDate = data.data.hijri;

                    // Menampilkan tanggal Gregorian dan Hijriyah di elemen HTML
                    document.getElementById('gregorian-date').textContent = gregorianDateFormatted;
                    document.getElementById('hijri-date').textContent =
                        `${hijriDate.day} ${hijriDate.month} ${hijriDate.year}`;
                } else {
                    console.error('Error fetching Hijri date from MyQuran API');
                }
            } catch (error) {
                console.error('API Error:', error);
            }
        }

        // Memanggil fungsi saat halaman dimuat
        window.onload = getDates;
    </script>

    <script>
        function updateTime() {
            const timeElement = document.getElementById("current-time");
            const now = new Date();
            const options = {
                timeZone: "Asia/Jakarta",
                hour: "2-digit",
                minute: "2-digit"
            };
            const formattedTime = new Intl.DateTimeFormat("id-ID", options).format(now);

            timeElement.textContent = `Bandung | ${formattedTime}`;
        }

        // Initial call
        updateTime();

        // Update every second
        setInterval(updateTime, 1000);
    </script>

</body>

</html>
