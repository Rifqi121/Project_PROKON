@extends('app')

@section('content')

<div class="row mt-1" style="height: 70vh;">
    <div class="col-sm-8 h-100 pe-0">
        <div class="card h-100" style="background-color: #2A332E;">
            <div class="container p-4">
                <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Kegiatan</h2>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="rounded"
                            style="position: relative; border: none; overflow: hidden; background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20240410/pngtree-beautiful-masjid-design-background-image_15712084.jpg'); background-size: cover; background-position: center; min-height: 25vh;">
                            <div
                                style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                                <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Pengumuman</h5>
                                <a href="#" style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rounded"
                            style="position: relative; border: none; overflow: hidden; background-image: url('https://ponpes.alhasanah.sch.id/wp-content/uploads/2020/05/Pentingnya-Kajian-Walaupun-Minimal-Sekali-Sepekan.jpg'); background-size: cover; background-position: center; min-height: 25vh;">
                            <div
                                style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                                <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Jadwal Kajian</h5>
                                <a href="#" style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rounded"
                            style="position: relative; border: none; overflow: hidden; background-image: url('https://live.staticflickr.com/159/335382059_9d5176bcb0_b.jpg'); background-size: cover; background-position: center; min-height: 25vh;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                                <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Jadwal Jumat</h5>
                                <a href="#" style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="rounded"
                            style="position: relative; border: none; overflow: hidden; background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20240410/pngtree-beautiful-masjid-design-background-image_15712084.jpg'); background-size: cover; background-position: center; min-height: 25vh;">
                            <div
                                style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                                <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Agenda</h5>
                                <a href="#" style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <a href="#kegiatan" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
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
    <a href="/jadwalsholat" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-clock-fill"></i> Jadwal Sholat
        </div>
    </a>
</div>

@endsection
