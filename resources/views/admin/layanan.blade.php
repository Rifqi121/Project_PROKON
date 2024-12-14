@extends('admin.admin')

@section('data')
<h1>Data Layanan</h1>
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
        <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahLayananModal">
            <i class="bi bi-plus"></i>Tambah Layanan
        </button>
    </div>

    <!-- Table -->
    <table class="tabel-data table table-responsive table-striped table-borderless table-hover"
        style="background-color: #374139;">
        <thead>
            <tr>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Perlengkapan Sholat</td>
                <td>Deskripsi layanan</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#detailLayananModal">Detail</button>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editLayananModal">Edit</button>
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

<!-- Modal Tambah Layanan -->
<div class="modal fade" id="tambahLayananModal" tabindex="-1" aria-labelledby="tambahLayananModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLayananModalLabel">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
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

<!-- Modal Detail Layanan -->
<div class="modal fade" id="detailLayananModal" tabindex="-1" aria-labelledby="detailLayananModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailLayananModalLabel">Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="GET">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly
                            style="resize: none;"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Layanan -->
<div class="modal fade" id="editLayananModal" tabindex="-1" aria-labelledby="editLayananModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLayananModalLabel">Edit Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div>
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
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
