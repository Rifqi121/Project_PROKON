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
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->layanan_name }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- Tombol Detail -->
                                <button class="btn btn-primary btn-sm detail-layanan-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailLayananModal" data-id="{{ $service->id }}"
                                    data-name="{{ $service->layanan_name }}">
                                    Detail
                                </button>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-layanan-btn"
                                    data-bs-toggle="modal" data-bs-target="#editLayananModal" data-id="{{ $service->id }}"
                                    data-name="{{ $service->layanan_name }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('layanan.delete', $service->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus layanan ini?')">
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

    <!-- Modal Tambah Layanan -->
    <div class="modal fade" id="tambahLayananModal" tabindex="-1" aria-labelledby="tambahLayananModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLayananModalLabel">Tambah Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label for="nama_layanan" class="form-label">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama_layanan" name="layanan_name" required>
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
                <div class="modal-body">
                    <label for="detail_nama_layanan" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" id="detail_nama_layanan" readonly>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Layanan -->
    <div class="modal fade" id="editLayananModal" tabindex="-1" aria-labelledby="editLayananModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLayananModalLabel">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editLayananForm" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="edit_nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="edit_nama_layanan" name="layanan_name" required>
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
            const editButtons = document.querySelectorAll(".edit-layanan-btn");
            const detailButtons = document.querySelectorAll(".detail-layanan-btn");

            // Modifikasi form dan input untuk modal edit
            const modalForm = document.getElementById("editLayananForm");
            const inputNameEdit = document.getElementById("edit_nama_layanan");

            // Modifikasi input untuk modal detail
            const inputNameDetail = document.getElementById("detail_nama_layanan");

            // Event listener untuk tombol Edit
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const layananId = button.getAttribute("data-id");
                    const layananName = button.getAttribute("data-name");

                    // Update form action URL untuk modal edit
                    modalForm.action = `/admin/layanan/${layananId}`;

                    // Update input field untuk modal edit
                    inputNameEdit.value = layananName;
                });
            });

            // Event listener untuk tombol Detail
            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const layananName = button.getAttribute("data-name");

                    // Update input field untuk modal detail
                    inputNameDetail.value = layananName;
                });
            });
        });
    </script>


@endsection
