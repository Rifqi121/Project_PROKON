@extends('app')

@section('content')

<div class="row mt-1" style="height: 70vh;">
    <div class="col-sm-8 h-100 pe-0">
        <div class="card h-100" style="background-color: #2A332E;">
            <div class="container p-4">
                <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Laporan</h2>
                <div class="table-responsive">
                    <table class="table table-striped laporan">
                        <thead>
                            <tr>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Amount</th>
                                <th>Jenis Pemasukan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>13/05/2022</td>
                                <td>$4.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>22/05/2022</td>
                                <td>$8.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>15/06/2022</td>
                                <td>$1,149.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>06/09/2022</td>
                                <td>$899.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>25/09/2022</td>
                                <td>$22.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>04/10/2022</td>
                                <td>$54.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                            <tr>
                                <td>Infaq Sholat Jumat</td>
                                <td>17/10/2022</td>
                                <td>$174.95</td>
                                <td>Infaq Jumat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pagination d-flex justify-content-center">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
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
    <a href="/kegiatan" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
        <div class="rounded text-center p-3" style="background-color: #2A332E;">
            <i class="bi bi-calendar-event-fill"></i> Kegiatan
        </div>
    </a>
    <a href="#laporan" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
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
