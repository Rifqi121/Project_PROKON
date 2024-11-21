@extends('app')

@section('content')

<div class="row mt-1" style="height: 70vh;">
    <div class="col-sm-8 h-100 pe-0">
        <div class="card h-100" style="background-color: #2A332E;">
            
        </div>
    </div>

    <div class="col-sm-4 d-flex flex-column justify-content-between h-100">
        <div class="card mb-2 h-50" style="background-color: #2A332E;">
            <div class="card-body"></div>
        </div>
        <div class="card h-50" style="background-color: #2A332E;">
            <div class="card-body"></div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mt-1 gap-2 rounded" style="height: 10vh;">
    <a href="/beranda" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-house-fill"></i> Beranda
        </div>
    </a>
    <a href="/kegiatan" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-calendar-event-fill"></i> Kegiatan
        </div>
    </a>
    <a href="/laporan" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-journal-text"></i> Laporan
        </div>
    </a>
    <a href="/shodaqoh" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-cash"></i> Shodaqoh
        </div>
    </a>
    <a href="#jadwalsholat" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-clock-fill"></i> Jadwal Sholat
        </div>
    </a>
</div>

@endsection
