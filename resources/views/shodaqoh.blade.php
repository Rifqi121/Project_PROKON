@extends('app')

@section('content')
    <div class="row mt-1" style="height: 75vh;">
        <div class="col-sm-8 h-100 pe-0">
            <div class="card h-100" style="background-color: #2A332E;">
                <div class="container p-4">
                    <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 0;">Shodaqoh</h2>
                    <div class="row g-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card h-100"
                                style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                                <img src="https://via.placeholder.com/600x400?text=Infaq+Masjid" class="card-img-top"
                                    alt="Infaq Masjid" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">Infaq Masjid</h5>
                                    <p class="card-text" style="font-size: 0.9rem;">Kami menerima infaq pada masjid
                                        Al-Ukhuwah</p>
                                    <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : +62 888 8888
                                        8888 (Bpk Fulan)</p>
                                    <a href="#" class="btn btn-light" style="color: #2A332E;">Bayar Infaq</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card h-100"
                                style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                                <img src="https://via.placeholder.com/600x400?text=Zakat" class="card-img-top"
                                    alt="Zakat" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">Zakat</h5>
                                    <p class="card-text" style="font-size: 0.9rem;">Kami menerima pembayaran Zakat pada
                                        masjid Al-Ukhuwah</p>
                                    <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : +62 888 8888
                                        8888 (Bpk Fulan)</p>
                                    <a href="#" class="btn btn-light" style="color: #2A332E;">Bayar Zakat</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card h-100"
                                style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                                <img src="https://via.placeholder.com/600x400?text=Donasi+Kegiatan" class="card-img-top"
                                    alt="Donasi Kegiatan"
                                    style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">Donasi Kegiatan</h5>
                                    <p class="card-text" style="font-size: 0.9rem;">Kami menerima titipan donasi melalui
                                        masjid Al-Ukhuwah</p>
                                    <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : +62 888 8888
                                        8888 (Bpk Fulan)</p>
                                    <a href="#" class="btn btn-light" style="color: #2A332E;">Bayar Donasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
