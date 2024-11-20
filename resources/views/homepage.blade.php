@extends('app')

@section('content')
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card" style="background-color: #2A332E;">
                <img src="{{ asset('image/masjid.jpg') }}" class="card-img" alt="Masjid Image">
                <div class="card-img-overlay d-flex flex-column justify-content-between p-5">
                    <h1 class="card-title" style="color:#FBFADA">Yayasan Al-Ukhuwwah</h1>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="btn" style="background-color: #2A332E; color:#FBFADA">Pelajari Lebih Lanjut <i class="bi bi-arrow-right"></i></a>
                        <a href="" class="text-decoration-none col-4">
                            <div class="text-end" style="color:#FBFADA">
                                <span>Silahkan klik untuk membuka maps</span>
                                <h6>Wastukancana no 27 Kel. Babakan Ciamis Kec. Sumur Bandung Kota Bandung</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-between">
            <div class="card mb-3 h-50" style="background-color: #2A332E;">
                <div class="card-body">
                </div>
            </div>
            <div class="card h-50" style="background-color: #2A332E;">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Navigasi Bawah -->
    <div class="d-flex justify-content-between align-items-center mt-2 gap-3 rounded">
        <div class="border rounded text-center p-3 flex-grow-1" style="background-color: #2A332E;">
            <i class="bi bi-house-fill"></i> Beranda
        </div>
        <div class="border rounded text-center p-3 flex-grow-1" style="background-color: #2A332E;">
            <i class="bi bi-calendar-event-fill"></i> Kegiatan
        </div>
        <div class="border rounded text-center p-3 flex-grow-1" style="background-color: #2A332E;">
            <i class="bi bi-journal-text"></i> Laporan
        </div>
        <div class="border rounded text-center p-3 flex-grow-1" style="background-color: #2A332E;">
            <i class="bi bi-cash"></i> Shodaqoh
        </div>
        <div class="border rounded text-center p-3 flex-grow-1" style="background-color: #2A332E;">
            <i class="bi bi-clock-fill"></i> Jadwal Sholat
        </div>
    </div>
</div>
@endsection
