@extends('admin.admin')

@section('data')
    <h1>Data Kegiatan</h1>
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
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahJumatanModal">
                <i class="bi bi-plus"></i>Tambah Jumatan
            </button>
        </div>

        <!-- Table -->
        <table class="tabel-data table table-responsive table-striped table-borderless table-hover"
            style="background-color: #374139;">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Khatib</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1/1/2023</td>
                    <td>Bapak Ustadz Adi Hidayat</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailJumatanModal">Detail</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editJumatanModal">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
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

    <!-- Modal Tambah Jumatan -->
    <div class="modal fade" id="tambahJumatanModal" tabindex="-1" aria-labelledby="tambahJumatanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJumatanModalLabel">Tambah Jumatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div>
                            <label for="khatib" class="form-label">Khatib</label>
                            <input type="text" class="form-control" id="khatib" name="khatib" required>
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

    <!-- Modal Detail Jumatan -->
    <div class="modal fade" id="detailJumatanModal" tabindex="-1" aria-labelledby="detailJumatanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailJumatanModalLabel">Jumatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="GET">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="khatib" class="form-label">Khatib</label>
                            <input type="text" class="form-control" id="khatib" name="khatib" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jumatan -->
    <div class="modal fade" id="editJumatanModal" tabindex="-1" aria-labelledby="editJumatanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJumatanModalLabel">Edit Jumatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="khatib" class="form-label">Khatib</label>
                            <input type="text" class="form-control" id="khatib" name="khatib" required>
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

@endsection