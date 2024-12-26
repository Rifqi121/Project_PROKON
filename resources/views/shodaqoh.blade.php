@extends('app')

@section('content')

<div class="card h-100" style="background-color: #2A332E;">
    <div class="p-4">
        <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 0;">Shodaqoh</h2>
        <div class="row g-4 scrollable-shodaqoh justify-content-center md-justify-content-start mt-lg-2">
            <!-- Card 1 -->
            <div class="col-8 col-md-4">
                <div class="card h-100"
                    style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                    <img src="{{ asset('image/infaq.png') }}" class="card-img-top" alt="Infaq Masjid"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px; object-fit: contain; width: 100%; height: 150px; display: block; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title">Infaq Masjid</h5>
                        <p class="card-text" style="font-size: 0.9rem;">Kami menerima infaq pada masjid Al-Ukhuwah</p>
                        <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : 0813 2402 1587</p>
                        <a href="#" class="btn btn-shodaqoh" data-bs-toggle="modal" data-bs-target="#shodaqohModal">Bayar Infaq</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-8 col-md-4">
                <div class="card h-100"
                    style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                    <img src="{{ asset('image/zakat.png') }}" class="card-img-top" alt="Zakat"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px; object-fit: contain; width: 100%; height: 150px; display: block; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title">Zakat</h5>
                        <p class="card-text" style="font-size: 0.9rem;">Kami menerima pembayaran Zakat pada masjid
                            Al-Ukhuwah</p>
                        <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : 0813 2402 1587</p>
                        <a href="#" class="btn btn-shodaqoh" data-bs-toggle="modal" data-bs-target="#zakatModal">Bayar Zakat</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-8 col-md-4">
                <div class="card h-100"
                    style="background-color: #2A332E; color: #FBFADA; border: 1px solid #FBFADA; border-radius: 10px;">
                    <img src="{{ asset('image/charity.png') }}" class="card-img-top" alt="Donasi Kegiatan"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px; object-fit: contain; width: 100%; height: 150px; display: block; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title">Donasi Kegiatan</h5>
                        <p class="card-text" style="font-size: 0.9rem;">Kami menerima titipan donasi melalui masjid
                            Al-Ukhuwah</p>
                        <p class="card-text" style="font-size: 0.9rem; margin-bottom: 1rem;">CP : 0813 2402 1587</p>
                        <a href="#" class="btn btn-shodaqoh" data-bs-toggle="modal" data-bs-target="#shodaqohModal">Bayar Donasi</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Zakat -->
<div class="modal fade" id="zakatModal" tabindex="-1" aria-labelledby="zakatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #2A332E; color: #FBFADA;">
            <div class="modal-header">
                <h5 class="modal-title" id="zakatModalLabel">Panduan Pembayaran Zakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Pembayaran zakat harus sesuai dengan syariat Islam, yakni:
                    <ul>
                        <li>Menghitung zakat yang wajib dibayar sesuai nishab dan haul.</li>
                        <li>Niat mengeluarkan zakat untuk membersihkan harta.</li>
                        <li>Untuk Perhitungannya adalah Nilai bersih harta x 2,5 persen.</li>
                    </ul>
                </p>
                <hr>
                <h6>Metode Pembayaran</h6>
                <div class="accordion" id="paymentMethods">
                    <!-- Bank Transfer -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingBank">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBank" aria-expanded="false" aria-controls="collapseBank">
                                Transfer Bank
                            </button>
                        </h2>
                        <div id="collapseBank" class="accordion-collapse collapse" aria-labelledby="headingBank" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                Rekening Bank:
                                <ul>
                                    <li>Bank Mandiri: 13000 1646 5943 a.n DKM AL UKHUWWAH GBA BARAT</li>
                                    <li>Bank BJB: 013 564 679 2100 a.n YAYASAN AL UKHUWWAH GBA BARAT</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- QRIS -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingQRIS">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQRIS" aria-expanded="false" aria-controls="collapseQRIS">
                                QRIS
                            </button>
                        </h2>
                        <div id="collapseQRIS" class="accordion-collapse collapse" aria-labelledby="headingQRIS" data-bs-parent="#paymentMethods">
                            <div class="accordion-body text-center">
                                <p>Scan QR Code di bawah ini untuk membayar zakat:</p>
                                <img src="{{ asset('image/qris.png') }}" alt="QR Code" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <!-- Tunai -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCash">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCash" aria-expanded="false" aria-controls="collapseCash">
                                Tunai
                            </button>
                        </h2>
                        <div id="collapseCash" class="accordion-collapse collapse" aria-labelledby="headingCash" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                Silakan langsung datang ke masjid Al-Ukhuwah dan menemui Bapak Fulan untuk pembayaran zakat tunai.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Shodaqoh -->
<div class="modal fade" id="shodaqohModal" tabindex="-1" aria-labelledby="shodaqohModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content" style="background-color: #2A332E; color: #FBFADA;">
            <div class="modal-header">
                <h5 class="modal-title" id="shodaqohModalLabel">Panduan Pembayaran Shodaqoh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Terimakasih sudah mempercayakan kami dan mendonasikan sebagian harta anda pada DKM Al-Ukhuwwah. <br>
                </p>
                <hr>
                <h6>Metode Pembayaran</h6>
                <div class="accordion" id="paymentMethods">
                    <!-- Bank Transfer -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingBank">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBank" aria-expanded="false" aria-controls="collapseBank">
                                Transfer Bank
                            </button>
                        </h2>
                        <div id="collapseBank" class="accordion-collapse collapse" aria-labelledby="headingBank" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                Rekening Bank:
                                <ul>
                                    <li>Bank Mandiri: 13000 1646 5943 a.n DKM AL UKHUWWAH GBA BARAT</li>
                                    <li>Bank BJB: 013 564 679 2100 a.n YAYASAN AL UKHUWWAH GBA BARAT</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- QRIS -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingQRIS">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQRIS" aria-expanded="false" aria-controls="collapseQRIS">
                                QRIS
                            </button>
                        </h2>
                        <div id="collapseQRIS" class="accordion-collapse collapse" aria-labelledby="headingQRIS" data-bs-parent="#paymentMethods">
                            <div class="accordion-body text-center">
                                <p>Scan QR Code di bawah ini untuk melakukan shodaqoh:</p>
                                <img src="{{ asset('image/qris.png') }}" alt="QR Code" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <!-- Tunai -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingCash">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCash" aria-expanded="false" aria-controls="collapseCash">
                                Tunai
                            </button>
                        </h2>
                        <div id="collapseCash" class="accordion-collapse collapse" aria-labelledby="headingCash" data-bs-parent="#paymentMethods">
                            <div class="accordion-body">
                                Silakan langsung datang ke masjid Al-Ukhuwah untuk melakukan shodaqoh tunai.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection
