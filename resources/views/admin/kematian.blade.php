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
            <form action="{{ route('death') }}" method="GET" style="width: 100%;">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDeathModal">
                <i class="bi bi-plus"></i>Tambah Data Kematian
            </button>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <!-- Table -->
        <table class="tabel-data table table-responsive table-striped table-borderless table-hover"
            style="background-color: #374139;">
            <thead>
                <tr>
                    <th>Nama Mayit</th>
                    <th>Tanggal Meninggal</th>
                    <th>Tempat Dikuburkan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deaths as $death)
                    <tr>
                        <td>{{ $death->nama_data_kematian }}</td>
                        <td>{{ $death->tanggal_data_kematian }}</td>
                        <td>{{ $death->tempat_data_kematian }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-info btn-sm detail-death-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailDeathModal" data-nama="{{ $death->nama_data_kematian }}"
                                    data-tanggal="{{ $death->tanggal_data_kematian }}"
                                    data-tempat="{{ $death->tempat_data_kematian }}">
                                    Detail
                                </button>


                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-death-btn" data-bs-toggle="modal"
                                    data-bs-target="#editDeathModal" data-id="{{ $death->id }}"
                                    data-nama="{{ $death->nama_data_kematian }}"
                                    data-tanggal="{{ $death->tanggal_data_kematian }}"
                                    data-tempat="{{ $death->tempat_data_kematian }}">
                                    Edit
                                </button>


                                <!-- Tombol Hapus -->
                                <form action="{{ route('death.delete', $death->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data kematian ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $deaths->links() }}
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

    <!-- Modal Tambah Data Kematian -->
    <div class="modal fade" id="tambahDeathModal" tabindex="-1" aria-labelledby="tambahDeathModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDeathModalLabel">Tambah Data Kematian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('death.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_data_kematian" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama_data_kematian" name="nama_data_kematian"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_data_kematian" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_data_kematian"
                                name="tanggal_data_kematian" required>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_data_kematian" class="form-label">Tempat</label>
                            <input type="text" class="form-control" id="tempat_data_kematian"
                                name="tempat_data_kematian" required>
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


    <!-- Modal Edit Data Kematian -->
    <div class="modal fade" id="editDeathModal" tabindex="-1" aria-labelledby="editDeathModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDeathModalLabel">Edit Data Kematian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="editDeathForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_nama_data_kematian" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="edit_nama_data_kematian"
                                name="nama_data_kematian" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tanggal_data_kematian" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tanggal_data_kematian"
                                name="tanggal_data_kematian" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tempat_data_kematian" class="form-label">Tempat</label>
                            <input type="text" class="form-control" id="edit_tempat_data_kematian"
                                name="tempat_data_kematian" required>
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


    <!-- Modal Detail Data Kematian -->
    <div class="modal fade" id="detailDeathModal" tabindex="-1" aria-labelledby="detailDeathModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailDeathModalLabel">Detail Data Kematian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_nama_data_kematian" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="detail_nama_data_kematian"
                            name="nama_data_kematian" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_tanggal_data_kematian" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="detail_tanggal_data_kematian"
                            name="tanggal_data_kematian" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_tempat_data_kematian" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="detail_tempat_data_kematian"
                            name="tempat_data_kematian" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-death-btn');
            const editForm = document.getElementById('editDeathForm');

            const detailButtons = document.querySelectorAll('.detail-death-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const tanggal = this.getAttribute('data-tanggal');
                    const tempat = this.getAttribute('data-tempat');

                    // Set data ke form
                    editForm.setAttribute('action', `/admin/kematian/${id}`);
                    document.getElementById('edit_nama_data_kematian').value = nama;
                    document.getElementById('edit_tanggal_data_kematian').value = tanggal;
                    document.getElementById('edit_tempat_data_kematian').value = tempat;
                });
            });

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nama = this.getAttribute('data-nama');
                    const tanggal = this.getAttribute('data-tanggal');
                    const tempat = this.getAttribute('data-tempat');

                    document.getElementById('detail_nama_data_kematian').value = nama;
                    document.getElementById('detail_tanggal_data_kematian').value =
                        tanggal;
                    document.getElementById('detail_tempat_data_kematian').value =
                        tempat;
                });
            });

        });
    </script>
@endsection
