@extends('admin.admin')

@section('data')
    <h1>Data Pengumuman</h1>
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
            <form action="{{ route('pengumuman') }}" method="GET" style="width: 100%;">
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
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahPengumumanModal">
                <i class="bi bi-plus"></i>Tambah Pengumuman
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
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengumumans as $pengumuman)
                    <tr>
                        <td>{{ $pengumuman->judul_pengumuman }}</td>
                        <td>{{ $pengumuman->tgl_pengumuman }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-info btn-sm detail-pengumuman-btn"
                                    data-bs-toggle="modal" data-bs-target="#detailPengumumanModal"
                                    data-judul="{{ $pengumuman->judul_pengumuman }}"
                                    data-tanggal="{{ $pengumuman->tgl_pengumuman }}"
                                    data-deskripsi="{{ $pengumuman->desc_pengumuman }}"
                                    data-gambar="{{ Storage::url($pengumuman->image) }}">
                                    Lihat Detail
                                </button>


                                <button type="button" class="btn btn-warning btn-sm edit-pengumuman-btn"
                                    data-bs-toggle="modal" data-bs-target="#editPengumumanModal"
                                    data-id="{{ $pengumuman->id }}" data-judul="{{ $pengumuman->judul_pengumuman }}"
                                    data-tanggal="{{ $pengumuman->tgl_pengumuman }}"
                                    data-deskripsi="{{ $pengumuman->desc_pengumuman }}"
                                    data-gambar="{{ asset('storage/' . $pengumuman->image) }}">
                                    Edit
                                </button>


                                <form action="{{ route('pengumuman.delete', $pengumuman->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">
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

    <!-- Modal Tambah Pengumuman -->
    <div class="modal fade" id="tambahPengumumanModal" tabindex="-1" aria-labelledby="tambahPengumumanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPengumumanModalLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input class="form-control" id="judul" name="judul_pengumuman" rows="3"
                                required></input>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="desc_pengumuman" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tgl_pengumuman" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" for="exampleInputtext1" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="exampleInputtext1" name="image"
                            accept="image/*">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Detail Pengumuman -->
    <div class="modal fade" id="detailPengumumanModal" tabindex="-1" aria-labelledby="detailPengumumanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailPengumumanModalLabel">Detail Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_judul_pengumuman" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="detail_judul_pengumuman" name="judul_pengumuman"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_tgl_pengumuman" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="detail_tgl_pengumuman" name="tgl_pengumuman"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detail_desc_pengumuman" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="detail_desc_pengumuman" name="desc_pengumuman" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detail_image_pengumuman" class="form-label">Gambar</label>
                        <img id="detail_image_pengumuman" src="" alt="Gambar Pengumuman" class="img-fluid"
                            style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit Pengumuman -->
    <div class="modal fade" id="editPengumumanModal" tabindex="-1" aria-labelledby="editPengumumanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPengumumanModalLabel">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data" id="editPengumumanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_judul_pengumuman" class="form-label">Judul</label>
                            <input class="form-control" id="edit_judul_pengumuman" name="judul_pengumuman" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tgl_pengumuman" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tgl_pengumuman" name="tgl_pengumuman"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <img id="edit_gambar_preview" src="" alt="Preview Gambar"
                                style="width: 150px; display: block; margin-bottom: 10px;">
                            <input type="file" name="image" class="form-control" id="edit_gambar_pengumuman">
                        </div>
                        <div class="mb-3">
                            <label for="edit_desc_pengumuman" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="edit_desc_pengumuman" name="desc_pengumuman" rows="3" required></textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-pengumuman-btn');
            const editForm = document.getElementById('editPengumumanForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const judul = this.getAttribute('data-judul');
                    const tanggal = this.getAttribute('data-tanggal');
                    const deskripsi = this.getAttribute('data-deskripsi');
                    const gambar = this.getAttribute('data-gambar');

                    // Set data ke form
                    editForm.setAttribute('action', `/admin/DataKegiatan/Pengumuman/${id}`);
                    document.getElementById('edit_judul_pengumuman').value = judul;
                    document.getElementById('edit_tgl_pengumuman').value = tanggal;
                    document.getElementById('edit_desc_pengumuman').value = deskripsi;

                    // Set gambar jika tersedia untuk pratinjau
                    const gambarPreview = document.getElementById('edit_gambar_preview');
                    if (gambarPreview) {
                        gambarPreview.src = gambar ? gambar : 'default_image_url';
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const detailButtons = document.querySelectorAll('.detail-pengumuman-btn');

            detailButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const judul = this.getAttribute('data-judul');
                    const tanggal = this.getAttribute('data-tanggal');
                    const deskripsi = this.getAttribute('data-deskripsi');
                    const gambar = this.getAttribute('data-gambar');

                    // Mengisi data ke dalam modal
                    document.getElementById('detail_judul_pengumuman').value = judul;
                    document.getElementById('detail_tgl_pengumuman').value = tanggal;
                    document.getElementById('detail_desc_pengumuman').value = deskripsi;
                    document.getElementById('detail_image_pengumuman').src = gambar;
                });
            });
        });
    </script>
@endsection
