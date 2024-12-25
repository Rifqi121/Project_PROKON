@extends('admin.admin')

@section('data')
    <h1>Data Laporan</h1>
    <div class="mt-4 p-4" style="background: #374139; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <div class="container py-3 d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-center me-3">
                <label for="entries-select" class="me-2" style="color: #FBFADA;">Show</label>
                <select id="entries-select" class="form-select form-select-sm w-auto">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                </select>
                <span class="ms-2" style="color: #FBFADA;">entries</span>
            </div>

            <!-- Search -->
            <div class="input-group input-group-sm" style="width: 80%;">
                <span class="input-group-text">
                    <i class="bi bi-search" style="color: #ccc;"></i>
                </span>
                <input type="text" class="form-control" placeholder="cari...">
            </div>
        </div>

        <div>
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahLaporanModal">
                <i class="bi bi-plus"></i>Tambah Laporan
            </button>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <table class="tabel-data table table-responsive table-striped table-borderless table-hover"
            style="background-color: #374139;">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Amount</th>
                    <th>Jenis Pemasukan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>{{ $report->judul_laporan }}</td>
                        <td>{{ $report->tanggal_laporan }}</td>
                        <td>{{ $report->jumlah_laporan }}</td>
                        <td>{{ $report->jenis_laporan }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- Tombol Detail -->
                                <button type="button" class="btn btn-primary btn-sm detail-report-btn"
                                    data-bs-toggle="modal" data-bs-target="#detailLaporanModal"
                                    data-id="{{ $report->id }}" data-judul="{{ $report->judul_laporan }}"
                                    data-tanggal="{{ $report->tanggal_laporan }}" data-jenis="{{ $report->jenis_laporan }}"
                                    data-jumlah="{{ $report->jumlah_laporan }}">
                                    Detail
                                </button>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-report-btn" data-bs-toggle="modal"
                                    data-bs-target="#editReportModal" data-id="{{ $report->id }}"
                                    data-judul="{{ $report->judul_laporan }}"
                                    data-tanggal="{{ $report->tanggal_laporan }}"
                                    data-jenis="{{ $report->jenis_laporan }}" data-jumlah="{{ $report->jumlah_laporan }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('laporan.delete', $report->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </table>
        <ul class="lap-page pagination justify-content-center py-3">
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </div>

    <!-- Modal Tambah Laporan -->
    <div class="modal fade" id="tambahLaporanModal" tabindex="-1" aria-labelledby="tambahLaporanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLaporanModalLabel">Tambah Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('laporan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Judul Laporan -->
                        <div class="mb-3">
                            <label for="judul_laporan" class="form-label">Judul Laporan</label>
                            <input type="text" class="form-control" id="judul_laporan" name="judul_laporan" required>
                        </div>

                        <!-- Tanggal Laporan -->
                        <div class="mb-3">
                            <label for="tanggal_laporan" class="form-label">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" required>
                        </div>

                        <!-- Jumlah Laporan -->
                        <div class="mb-3">
                            <label for="jumlah_laporan" class="form-label">Jumlah Laporan</label>
                            <input type="number" class="form-control" id="jumlah_laporan" name="jumlah_laporan"
                                min="0" required>
                        </div>

                        <!-- Jenis Laporan -->
                        <div class="mb-3">
                            <label for="jenis_laporan" class="form-label">Jenis Laporan</label>
                            <select class="form-select" id="jenis_laporan" name="jenis_laporan" required>
                                <option value="" selected disabled>Pilih Jenis Laporan</option>
                                <option value="Pendapatan">Pendapatan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                                <option value="Transaksi">Transaksi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Detail Laporan -->
    <div class="modal fade" id="detailLaporanModal" tabindex="-1" aria-labelledby="detailLaporanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailLaporanModalLabel">Detail Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_judul_laporan" class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" id="detail_judul_laporan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_tanggal_laporan" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="detail_tanggal_laporan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_jenis_laporan" class="form-label">Jenis Laporan</label>
                        <input type="text" class="form-control" id="detail_jenis_laporan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_jumlah_laporan" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="detail_jumlah_laporan" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Laporan -->
    <div class="modal fade" id="editReportModal" tabindex="-1" aria-labelledby="editReportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReportModalLabel">Edit Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editReportForm" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Judul Laporan -->
                        <div class="mb-3">
                            <label for="edit_judul_report" class="form-label">Judul Report</label>
                            <input type="text" class="form-control" id="edit_judul_report" name="judul_laporan"
                                required>
                        </div>

                        <!-- Tanggal Laporan -->
                        <div class="mb-3">
                            <label for="edit_tanggal_report" class="form-label">Tanggal Report</label>
                            <input type="date" class="form-control" id="edit_tanggal_report" name="tanggal_laporan"
                                required>
                        </div>

                        <!-- Jumlah Laporan -->
                        <div class="mb-3">
                            <label for="edit_jumlah_report" class="form-label">Jumlah Report</label>
                            <input type="number" class="form-control" id="edit_jumlah_report" name="jumlah_laporan"
                                required>
                        </div>

                        <!-- Jenis Laporan -->
                        <div class="mb-3">
                            <label for="edit_jenis_report" class="form-label">Jenis Report</label>
                            <select class="form-select" id="edit_jenis_report" name="jenis_laporan" required>
                                <option value="Pendapatan">Pendapatan</option>
                                <option value="Pengeluaran">Pengeluaran</option>
                                <option value="Transaksi">Transaksi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-report-btn");

            // Modifikasi form dan input untuk modal edit
            const modalForm = document.getElementById("editReportForm");
            const inputJudul = document.getElementById("edit_judul_report");
            const inputTanggal = document.getElementById("edit_tanggal_report");
            const inputJenis = document.getElementById("edit_jenis_report");
            const inputJumlah = document.getElementById("edit_jumlah_report");

            // Event listener untuk tombol Edit
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const reportId = button.getAttribute("data-id");
                    const reportJudul = button.getAttribute("data-judul");
                    const reportTanggal = button.getAttribute("data-tanggal");
                    const reportJenis = button.getAttribute("data-jenis");
                    const reportJumlah = button.getAttribute("data-jumlah");

                    // Update form action URL untuk modal edit
                    modalForm.action = `/admin/DataKegiatan/Laporan/${reportId}`;

                    // Update input fields untuk modal edit
                    inputJudul.value = reportJudul;
                    inputTanggal.value = reportTanggal;
                    inputJenis.value = reportJenis;
                    inputJumlah.value = reportJumlah;
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const detailButtons = document.querySelectorAll(".detail-report-btn");

            // Ambil elemen-elemen input untuk modal detail
            const inputJudul = document.getElementById("detail_judul_laporan");
            const inputTanggal = document.getElementById("detail_tanggal_laporan");
            const inputJenis = document.getElementById("detail_jenis_laporan");
            const inputJumlah = document.getElementById("detail_jumlah_laporan");

            // Event listener untuk tombol Detail
            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const reportId = button.getAttribute("data-id");
                    const reportJudul = button.getAttribute("data-judul");
                    const reportTanggal = button.getAttribute("data-tanggal");
                    const reportJenis = button.getAttribute("data-jenis");
                    const reportJumlah = button.getAttribute("data-jumlah");

                    // Isi input fields dengan data laporan
                    inputJudul.value = reportJudul;
                    inputTanggal.value = reportTanggal;
                    inputJenis.value = reportJenis;
                    inputJumlah.value = reportJumlah;
                });
            });
        });
    </script>


@endsection
