@extends('app')

@section('content')
<div class="card h-100" style="background-color: #2A332E;">
    <div class="card-jadwal card-scroll">
        <div class="card-body">
            <div class="datepicker">
                <div class="datepicker-calendar" id="calendar">
                </div>
            </div>
        </div>
    </div>
    <div class="card-jadwal card-scroll mt-3">
        <div class="card-body d-flex flex-column gap-3 mx-3 py-0">
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

@endsection
