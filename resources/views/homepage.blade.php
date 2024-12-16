@extends('app')

@section('content')
    <div class="row mt-1 d-flex" style="height: 70vh; overflow-x: hidden;">
        <div class="col-sm-8 pe-0">
            <!-- Flip Container -->
            <div class="flip-container position-relative h-100 w-100" style="perspective: 1000px;">
                <!-- Flip Inner -->
                <div class="flip-inner h-100 w-100"
                    style="transition: transform 0.6s; transform-style: preserve-3d; position: relative;">
                    <!-- Front Side -->
                    <div class="rounded flip-front position-absolute top-0 start-0 h-100 w-100"
                        style="background-color: #2A332E; backface-visibility: hidden;">
                        <img src="{{ asset('image/masjid.jpg') }}" class="card-img h-100 w-100 rounded" alt="Masjid Image">
                        <div class="card-img-overlay d-flex flex-column justify-content-between p-5">
                            <h1 class="card-title" style="color:#FBFADA">Yayasan Al-Ukhuwwah</h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="col-8">
                                    <button class="btn p-3 flip-btn"
                                        style="background-color: #2A332E; color:#FBFADA">Pelajari Lebih Lanjut</button>
                                </div>
                                <a href="" class="text-decoration-none col-4">
                                    <div class="text-end" style="color:#FBFADA">
                                        <span>Silahkan klik untuk membuka maps</span>
                                        <h6>Wastukancana no 27 Kel. Babakan Ciamis Kec. Sumur Bandung Kota Bandung</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Back Side -->
                    <div class="flip-back position-absolute top-0 start-0 h-100 w-100"
                        style="background-color: #2A332E; backface-visibility: hidden; transform: rotateY(180deg);">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 p-5">
                            <!-- Carousel -->
                            <div id="carouselExample" class="carousel slide w-100 h-100">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="d-flex flex-column text-start h-100">
                                            <h3 style="color: #FBFADA;">Deskripsi Singkat</h3>
                                            <p style="color: #FBFADA; font-size: 12px;">Sajarah pangwangunan masjid ieu
                                                kaitung miboga sajarah nu panjang, lantaran lokasi nu ayeuna jadi masjid
                                                téh, saméméhna pernah diwangun dua wangunan anu beda. Pas zaman panjajahan
                                                bahéula, lokasi masjid ieu pernah anceg wangunan gedong nu dijadikeun tempat
                                                pakumpulan kaum nu miboga idéologi Freemason.</p>
                                            <h3 style="color: #FBFADA;">Layanan</h3>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="card py-2 px-3 layanan">Shalat Wajib</div>
                                                <div class="card py-2 px-3 layanan">Shalat Jumat</div>
                                                <div class="card py-2 px-3 layanan">Pengajian Anak</div>
                                                <div class="card py-2 px-3 layanan">Pengajian Ibu-ibu</div>
                                                <div class="card py-2 px-3 layanan">Pengajian Bapak-bapak</div>
                                                <div class="card py-2 px-3 layanan">Zakat</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="d-flex flex-column text-start">
                                            <h3 style="color: #FBFADA;">Layanan</h3>
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="row g-4">
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Tempat Wudhu Terpisah</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Area Shalat Full Karpet</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Perlengkapan Shalat</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Air Conditioner</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Teh & Kopi Gratis</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card p-3 fasilitas">
                                                            <h5 class="card-title">Tempat Parkir Luas</h5>
                                                            <p class="card-text">Read more</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between align-items-center w-100" style="top: 85%;">
                                <!-- Tombol Kembali -->
                                <button class="btn flip-btn"
                                    style="color: #2A332E; background-color: #FBFADA;">Kembali</button>

                                <!-- Tombol Navigasi -->

                                <button class="carousel-control-prev me-2" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev"
                                    style="left: calc(100% - 120px); width: 30px; height: 30px; top: 85%;">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next"
                                    style="left: calc(100% - 60px); width: 30px; height: 30px; top: 85%;">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kolom Kanan -->
        <div class="col-sm-4 gap-2 d-flex flex-column justify-content-between h-100"
            style="padding-left: calc(var(--bs-gutter-x)* .2);">
            <div class="card h-50 w-100" style="background-color: #2A332E;">
                <div class="card-body"></div>
            </div>
            <div class="card h-50 w-100" style="background-color: #2A332E;">
                <div class="card-body"></div>
            </div>
        </div>
    </div>

    <!-- Bagian Navigasi Bawah -->
    <div class="d-flex justify-content-between align-items-center mt-1 gap-2 rounded" style="height: 10vh;">
        <a href="#beranda" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
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
        <a href="/jadwalsholat" class="text-decoration-none flex-grow-1" style="color: #FBFADA;">
            <div class="rounded text-center p-3" style="background-color: #2A332E;">
                <i class="bi bi-clock-fill"></i> Jadwal Sholat
            </div>
        </a>
    </div>


    <!-- Script -->
    <script>
        document.querySelectorAll('.flip-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const flipInner = btn.closest('.flip-container').querySelector('.flip-inner');
                flipInner.style.transform = flipInner.style.transform === 'rotateY(180deg)' ? '' :
                    'rotateY(180deg)';
            });
        });
    </script>
@endsection
