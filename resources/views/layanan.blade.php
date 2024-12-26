@extends('app')

@section('content')

<div class="rounded position-relative h-100 w-100" style="perspective: 1000px; background-color: #2A332E;">
    <div class="d-flex flex-column justify-content-center align-items-center text-center h-100 p-5">
        <!-- Carousel -->
        <div id="carouselInfo" class="carousel slide w-100 h-100">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex flex-column text-start">
                        <h3 style="color: #FBFADA;">Deskripsi Singkat</h3>
                        <div class="scrollable-layanan">
                            <p class="" style="color: #FBFADA; font-size: 12px; text-overflow: ellipsis;">Masjid Al
                                Ukhuwwah didirikan atas dasar kepedulian warga komplek GBA Barat yang menempati
                                perumahan tersebut mulai awal 2005, dengan semakin banyaknya penghuni komplek yang
                                menghuni perumahan maka semakin mendesak kebutuhan akan sarana ibadah yang
                                refresentative yang pada awal 2005 kegiatan ibadah terutama sholat berjamaah dan shalat
                                tarawih menggunakan rumah warga yang belum dihuni
                                Kemudian pada tahun 2008 diatas tanah fasilitas Sosial dari pengembang perumahan GBA
                                Barat yaitu PT. Kharisma yang diserahkan pada warga Perumahan Komplek GBA Barat untuk
                                didirikan sebuah masjid berdasarkan Berita Acara Penyerahan. Alhamdulillah pada bulan
                                agustus Tahun 2008 mulai dibangun masjid dengan peletakan batu pertama oleh Kepala desa
                                lengkong saat itu bapak lurah Oteng disaksikan oleh tokoh Masyarakat ciganitri bapak H.
                                Rohman dan bapak Ajay warga RW 09 desa lengkong dan para pendiri yang sekaligus sebagai
                                penitia Pembangunan masjid. </p>
                        </div>
                        <div class="">
                            <h3 style="color: #FBFADA;">Layanan</h3>
                            <div
                                class="d-flex flex-wrap gap-3 scrollable-layanan justify-content-between align-items-start px-2 py-3 scrollable-fasilitas">
                                <!-- Card Pendidikan & Pemberdayaan -->
                                <div class="col-12 col-md-4 justify-content-center h-100">
                                    <div class="card layanan text-center px-1 py-3 hover-effect"
                                        data-bs-toggle="collapse" data-bs-target="#collapsePendidikan"
                                        aria-expanded="false" aria-controls="collapsePendidikan"
                                        style="cursor: pointer;">
                                        <span>Pendidikan & Pemberdayaan</span>
                                    </div>
                                    <div id="collapsePendidikan" class="collapse">
                                        <ul class="list-group list-custom">
                                            <li class="list-group-item">Program Beasiswa</li>
                                            <li class="list-group-item">Kelas Tahsin & Tahfidz</li>
                                            <li class="list-group-item">Pelatihan Keterampilan</li>
                                            <li class="list-group-item">Layanan Konseling Keagamaan</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Card Peribadatan & Dakwah -->
                                <div class="col-12 col-md-4 justify-content-center h-100">
                                    <div class="card layanan text-center p-3 hover-effect" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSP" aria-expanded="false" aria-controls="collapseSP"
                                        style="cursor: pointer;">
                                        <span>Peribadatan & Dakwah</span>
                                    </div>
                                    <div id="collapseSP" class="collapse">
                                        <ul class="list-group list-custom">
                                            <li class="list-group-item">Kajian Keislaman Rutin</li>
                                            <li class="list-group-item">Pengajian Bulanan</li>
                                            <li class="list-group-item">Kegiatan Ibadah Jumat</li>
                                            <li class="list-group-item">Penyelenggaraan Salat Idul Fitri & Idul Adha
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Card Sarana & Prasarana -->
                                <div class="col-12 col-md-3 justify-content-center h-100">
                                    <div class="card layanan text-center p-3 hover-effect" data-bs-toggle="collapse"
                                        data-bs-target="#collapseZI" aria-expanded="false" aria-controls="collapseZI"
                                        style="cursor: pointer;">
                                        <span>Sarana & Prasarana</span>
                                    </div>
                                    <div id="collapseZI" class="collapse">
                                        <ul class="list-group list-custom">
                                            <li class="list-group-item">Tempat Wudhu Pria & Wanita</li>
                                            <li class="list-group-item">Area Salat dengan Karpet Nyaman</li>
                                            <li class="list-group-item">Pendingin Udara (AC)</li>
                                            <li class="list-group-item">Parkir Luas</li>
                                            <li class="list-group-item">Kamar Mandi & Toilet Bersih</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex flex-column text-start">
                        <h3 style="color: #FBFADA;">Fasilitas</h3>
                        <div class="row g-3 scrollable-fasilitas d-flex justify-content-center align-items-start">
                            <!-- Card Sarana -->
                            <div class="col-12 col-sm-6">
                                <div class="card p-3 fasilitas h-100 hover-effect" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSarana" aria-expanded="false"
                                    aria-controls="collapseSarana" style="cursor: pointer;">
                                    <h5 class="card-title">Sarana</h5>
                                    <p class="card-text">Read more</p>
                                </div>
                                <!-- Collapse Sarana -->
                                <div id="collapseSarana" class="collapse mt-2" style="transition: height 0.3s ease;">
                                    <ul class="list-group list-custom">
                                        <li class="list-group-item">Tempat Wudhu</li>
                                        <li class="list-group-item">Area Shalat Full Karpet</li>
                                        <li class="list-group-item">Air Conditioner</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Card Prasarana -->
                            <div class="col-12 col-sm-6">
                                <div class="card p-3 fasilitas h-100 hover-effect" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePrasarana" aria-expanded="false"
                                    aria-controls="collapsePrasarana" style="cursor: pointer;">
                                    <h5 class="card-title">Prasarana</h5>
                                    <p class="card-text">Read more</p>
                                </div>
                                <!-- Collapse Prasarana -->
                                <div id="collapsePrasarana" class="collapse mt-2" style="transition: height 0.3s ease;">
                                    <ul class="list-group list-custom">
                                        <li class="list-group-item">Tempat Parkir Luas</li>
                                        <li class="list-group-item">Teh & Kopi Gratis</li>
                                        <li class="list-group-item">Perlengkapan Shalat</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex flex-column text-start">
                        <h3 style="color: #FBFADA;">Informasi Masjid</h3>
                        <div class="row g-3">
                            <div class="col-12 informasi-masjid">
                                <table class="table table-borderless table-striped"
                                    style="background-color: #2A332E; color: #FBFADA;">
                                    <tbody>
                                        <tr>
                                            <td>Nama Yayasan</td>
                                            <td>Yayasan Al Ukhuwwah – GBA Barat</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Masjid</td>
                                            <td>Masjid Al Ukhuwwah</td>
                                        </tr>
                                        <tr>
                                            <td>Tipe</td>
                                            <td>Masjid Jami</td>
                                        </tr>
                                        <tr>
                                            <td>ID Masjid</td>
                                            <td>01.4.04.01.03.000058</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>Komplek GBA Barat RW 14 – Desa Lengong- Bojongsoang</td>
                                        </tr>
                                        <tr>
                                            <td>Status Tanah</td>
                                            <td>Wakaf</td>
                                        </tr>
                                        <tr>
                                            <td>Luas Tanah</td>
                                            <td>750 m²</td>
                                        </tr>
                                        <tr>
                                            <td>Luas Bangunan</td>
                                            <td>300 m²</td>
                                        </tr>
                                        <tr>
                                            <td>Daya Tampung</td>
                                            <td>500 jamaah</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Berdiri</td>
                                            <td>2008</td>
                                        </tr>
                                        <tr>
                                            <td>Kondisi Masjid</td>
                                            <td>Cukup Baik</td>
                                        </tr>
                                        <tr>
                                            <td>Fasilitas</td>
                                            <td>MDTA Al-Al Ukhuwwah</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pengurus</td>
                                            <td>49 orang</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Imam</td>
                                            <td>5 orang</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center w-100" style="top: 85%;">
            <!-- Tombol Kembali -->
            <a href="{{ route('home') }}" class="btn mt-3 mt-md-0"
                style="color: #2A332E; background-color: #FBFADA;">Kembali</a>

            <!-- Tombol Navigasi -->

            <button class="carousel-control-prev me-2" type="button" data-bs-target="#carouselInfo" data-bs-slide="prev"
                style="left: calc(100% - 120px); width: 30px; height: 30px; top: 85%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselInfo" data-bs-slide="next"
                style="left: calc(100% - 60px); width: 30px; height: 30px; top: 85%;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>

        </div>
    </div>

</div>
</div>
@endsection
