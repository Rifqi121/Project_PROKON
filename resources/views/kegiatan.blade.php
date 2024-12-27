@extends('app')

@section('content')
    <div class="card h-100" style="background-color: #2A332E;">
        <div class="col-12 p-4 h-100">
            <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Kegiatan</h2>
            <div class="row g-2 scrollable-kegiatan">
                <div class="col-md-6">
                    <div class="rounded"
                        style="position: relative; border: none; overflow: hidden; background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20240410/pngtree-beautiful-masjid-design-background-image_15712084.jpg'); background-size: cover; background-position: center; min-height: 25vh; ">
                        <div
                            style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                            <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Pengumuman
                            </h5>
                            <a href="{{ route('user.pengumuman') }}"
                                style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rounded"
                        style="position: relative; border: none; overflow: hidden; background-image: url('{{ asset('image/kajian.png') }}'); background-size: cover; background-position: center; min-height: 25vh;">
                        <div
                            style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                            <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Jadwal
                                Kajian</h5>
                            <a href="{{ route('jadwalkajian') }}"
                                style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rounded"
                        style="position: relative; border: none; overflow: hidden; background-image: url('https://live.staticflickr.com/159/335382059_9d5176bcb0_b.jpg'); background-size: cover; background-position: center; min-height: 25vh;">
                        <div
                            style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                            <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Jadwal
                                Jumat</h5>
                            <a href="{{ route('jadwaljumat') }}"
                                style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rounded"
                        style="position: relative; border: none; overflow: hidden; background-image: url('{{ asset('image/agenda.png') }}'); background-size: cover; background-position: center; min-height: 25vh;">
                        <div
                            style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; background: rgba(0, 0, 0, 0.5);">
                            <h5 style="font-size: 1.2rem; font-weight: bold; margin: 0; color: #FBFADA;">Agenda</h5>
                            <a href="{{ route('user.agenda') }}"
                                style="font-size: 0.9rem; text-decoration: none; color: #FBFADA;">Klik
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
