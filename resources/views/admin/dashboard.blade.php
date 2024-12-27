@extends('admin.admin')

@section('data')
    <div class=" container-fluid py-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('adminLayanan') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-house-fill"></i>
                        </div>
                        <div class="card-title">Layanan</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('pengumuman') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="card-title">Pengumuman</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('kajian') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="card-title">Jadwal Kajian</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('JumatSchedules') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="card-title">Jadwal Jumat</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('agenda') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                        <div class="card-title">Agenda</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="{{ route('laporan') }}">
                    <div class="card text-center p-4">
                        <div class="card-icon mb-3">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        <div class="card-title">Laporan</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
