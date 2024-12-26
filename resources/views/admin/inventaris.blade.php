@extends('admin.admin')

@section('data')
    <h1>Data Inventaris</h1>
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
            <form action="{{ route('inventaris') }}" method="GET" style="width: 100%;">
                <div class="input-group input-group-sm" style="width: 80%;">
                    <span class="input-group-text">
                        <i class="bi bi-search" style="color: #ccc;"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="cari..." name="search"
                        value="{{ $keyword ?? '' }}">
                </div>
            </form>
        </div>

        <div>
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahInventarisModal">
                <i class="bi bi-plus"></i>Tambah Inventaris
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
                    <th>Nama Inventaris</th>
                    <th>Jumlah Inventaris</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventaris as $inventory)
                    <tr>
                        <td>{{ $inventory->nama_barang }}</td>
                        <td>{{ $inventory->jumlah_barang }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- Tombol Detail -->
                                <button class="btn btn-primary btn-sm detail-inventaris-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailInventarisModal" data-id="{{ $inventory->id }}"
                                    data-name="{{ $inventory->nama_barang }}" data-jumlah="{{ $inventory->jumlah_barang }}">
                                    Detail
                                </button>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-inventaris-btn"
                                    data-bs-toggle="modal" data-bs-target="#editInventarisModal"
                                    data-id="{{ $inventory->id }}" data-name="{{ $inventory->nama_barang }}"
                                    data-jumlah="{{ $inventory->jumlah_barang }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('inventaris.delete', $inventory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

        </table>
        {{ $inventaris->links() }}
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
    <div class="modal fade" id="tambahInventarisModal" tabindex="-1" aria-labelledby="tambahInventarisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahInventarisModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('inventaris.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div>
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" required>
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
    <div class="modal fade" id="detailInventarisModal" tabindex="-1" aria-labelledby="detailInventarisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailInventarisModalLabel">Inventaris</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="detail_nama_barang" class="form-label">Nama Layanan</label>
                    <input type="text" class="form-control" id="detail_nama_barang" readonly>
                </div>
                <div class="modal-body">
                    <label for="detail_jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control" id="detail_jumlah_barang" name="jumlah_barang" required>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Layanan -->
    <div class="modal fade" id="editInventarisModal" tabindex="-1" aria-labelledby="editInventarisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInventarisModalLabel">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editInventarisForm" action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="edit_nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="edit_nama_barang" name="nama_barang" required>
                    </div>
                    <div class="modal-body">
                        <label for="edit_jumlah_barang" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="edit_jumlah_barang" name="jumlah_barang"
                            required>
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
            const editButtons = document.querySelectorAll(".edit-inventaris-btn");
            const detailButtons = document.querySelectorAll(".detail-inventaris-btn");

            // Modifikasi form dan input untuk modal edit
            const modalForm = document.getElementById("editInventarisForm");
            const inputNameEdit = document.getElementById("edit_nama_barang");
            const inputJumlahEdit = document.getElementById("edit_jumlah_barang");

            // Modifikasi input untuk modal detail
            const inputNameDetail = document.getElementById("detail_nama_barang");
            const inputJumlahDetail = document.getElementById("detail_jumlah_barang");

            // Event listener untuk tombol Edit
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const inventarisId = button.getAttribute("data-id");
                    const inventarisName = button.getAttribute("data-name");
                    const inventarisJumlah = button.getAttribute("data-jumlah");

                    // Update form action URL untuk modal edit
                    modalForm.action = `/admin/inventaris/${inventarisId}`;

                    // Update input field untuk modal edit
                    inputNameEdit.value = inventarisName;
                    inputJumlahEdit.value = inventarisJumlah;
                });
            });

            // Event listener untuk tombol Detail
            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const inventarisName = button.getAttribute("data-name");
                    const inventarisJumlah = button.getAttribute("data-jumlah");

                    // Update input field untuk modal detail
                    inputNameDetail.value = inventarisName;
                    inputJumlahDetail.value = inventarisJumlah;
                });
            });
        });
    </script>


@endsection
