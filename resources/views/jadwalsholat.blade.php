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
    <a href="/beranda" class="nav-btn">
        <div>
            <i class="bi bi-house-fill"></i> Beranda
        </div>
    </a>
    <a href="/kegiatan" class="nav-btn">
        <div>
            <i class="bi bi-calendar-event-fill"></i> Kegiatan
        </div>
    </a>
    <a href="/laporan" class="nav-btn">
        <div>
            <i class="bi bi-journal-text"></i> Laporan
        </div>
    </a>
    <a href="/shodaqoh" class="nav-btn">
        <div>
            <i class="bi bi-cash"></i> Shodaqoh
        </div>
    </a>
    <a href="#jadwalsholat" class="nav-btn active">
        <div>
            <i class="bi bi-clock-fill"></i>
        </div>
    </a>
</div>

@endsection
