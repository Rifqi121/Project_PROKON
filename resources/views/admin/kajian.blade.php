@extends('admin.admin')

@section('data')
    <h1>Data Kajian</h1>
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
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahKajianModal">
                <i class="bi bi-plus"></i>Tambah Kajian
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
                    <th>Judul Kajian</th>
                    <th>Tanggal</th>
                    <th>Pengisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kajians as $kajian)
                    <tr>
                        <td>{{ $kajian->judul_jadwal_kajian }}</td>
                        <td>{{ $kajian->tanggal_jadwal_kajian }}</td>
                        <td>{{ $kajian->pengisi_jadwal_kajian }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                {{-- Detail Button --}}
                                <button type="button" class="btn btn-info btn-sm detail-kajian-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailKajianModal" data-judul="{{ $kajian->judul_jadwal_kajian }}"
                                    data-tanggal="{{ $kajian->tanggal_jadwal_kajian }}"
                                    data-pengisi="{{ $kajian->pengisi_jadwal_kajian }}"
                                    data-deskripsi="{{ $kajian->deskripsi_jadwal_kajian }}">
                                    Detail
                                </button>

                                {{-- Edit Button --}}
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editKajianModal" data-id="{{ $kajian->id }}"
                                    data-judul="{{ $kajian->judul_jadwal_kajian }}"
                                    data-tanggal="{{ $kajian->tanggal_jadwal_kajian }}"
                                    data-pengisi="{{ $kajian->pengisi_jadwal_kajian }}"
                                    data-deskripsi="{{ $kajian->deskripsi_jadwal_kajian }}">
                                    Edit
                                </button>

                                {{-- Delete Button --}}
                                <form action="{{ route('kajian.delete', $kajian->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus kajian ini?')">
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

    <!-- Modal Tambah Kajian -->
    <div class="modal fade" id="tambahKajianModal" tabindex="-1" aria-labelledby="tambahKajianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKajianModalLabel">Tambah Kajian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('kajian.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Judul Kajian -->
                        <div class="mb-3">
                            <label for="judul_jadwal_kajian" class="form-label">Judul Kajian</label>
                            <input type="text" class="form-control" id="judul_jadwal_kajian" name="judul_jadwal_kajian"
                                required>
                        </div>

                        <!-- Tanggal Kajian -->
                        <div class="mb-3">
                            <label for="tanggal_jadwal_kajian" class="form-label">Tanggal Kajian</label>
                            <input type="date" class="form-control" id="tanggal_jadwal_kajian"
                                name="tanggal_jadwal_kajian" required>
                        </div>

                        <!-- Pengisi Kajian -->
                        <div class="mb-3">
                            <label for="pengisi_jadwal_kajian" class="form-label">Pengisi Kajian</label>
                            <input type="text" class="form-control" id="pengisi_jadwal_kajian"
                                name="pengisi_jadwal_kajian" required>
                        </div>

                        <!-- Deskripsi Kajian -->
                        <div class="mb-3">
                            <label for="deskripsi_jadwal_kajian" class="form-label">Deskripsi Kajian</label>
                            <textarea class="form-control" id="deskripsi_jadwal_kajian" name="deskripsi_jadwal_kajian" rows="3"
                                style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Detail Kajian -->
    <div class="modal fade" id="detailKajianModal" tabindex="-1" aria-labelledby="detailKajianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailKajianModalLabel">Detail Kajian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul_jadwal_kajian_detail" class="form-label">Judul Kajian</label>
                        <input type="text" class="form-control" id="judul_jadwal_kajian_detail"
                            name="judul_jadwal_kajian_detail" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_jadwal_kajian_detail" class="form-label">Tanggal Kajian</label>
                        <input type="date" class="form-control" id="tanggal_jadwal_kajian_detail"
                            name="tanggal_jadwal_kajian_detail" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="pengisi_jadwal_kajian_detail" class="form-label">Pengisi Kajian</label>
                        <input type="text" class="form-control" id="pengisi_jadwal_kajian_detail"
                            name="pengisi_jadwal_kajian_detail" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_jadwal_kajian_detail" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_jadwal_kajian_detail" name="deskripsi_jadwal_kajian_detail"
                            rows="3" readonly style="resize: none;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kajian -->
    <div class="modal fade" id="editKajianModal" tabindex="-1" aria-labelledby="editKajianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKajianModalLabel">Edit Kajian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="editKajianForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Judul Kajian -->
                        <div class="mb-3">
                            <label for="edit_judul_jadwal_kajian" class="form-label">Judul Kajian</label>
                            <input type="text" class="form-control" id="edit_judul_jadwal_kajian"
                                name="judul_jadwal_kajian" required>
                        </div>

                        <!-- Tanggal Kajian -->
                        <div class="mb-3">
                            <label for="edit_tanggal_jadwal_kajian" class="form-label">Tanggal Kajian</label>
                            <input type="date" class="form-control" id="edit_tanggal_jadwal_kajian"
                                name="tanggal_jadwal_kajian" required>
                        </div>

                        <!-- Pengisi Kajian -->
                        <div class="mb-3">
                            <label for="edit_pengisi_jadwal_kajian" class="form-label">Pengisi Kajian</label>
                            <input type="text" class="form-control" id="edit_pengisi_jadwal_kajian"
                                name="pengisi_jadwal_kajian" required>
                        </div>

                        <!-- Deskripsi Kajian -->
                        <div class="mb-3">
                            <label for="edit_deskripsi_jadwal_kajian" class="form-label">Deskripsi Kajian</label>
                            <textarea class="form-control" id="edit_deskripsi_jadwal_kajian" name="deskripsi_jadwal_kajian" rows="3"
                                style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editKajianModal = document.getElementById('editKajianModal');
            const editKajianForm = document.getElementById('editKajianForm');

            editKajianModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const kajian = button.getAttribute('data-id');
                const judul = button.getAttribute('data-judul');
                const tanggal = button.getAttribute('data-tanggal');
                const pengisi = button.getAttribute('data-pengisi');
                const deskripsi = button.getAttribute('data-deskripsi');

                // Isi form dengan data dari tombol
                editKajianForm.action = `/admin/DataKegiatan/Kajian/${kajian}`;
                editKajianForm.querySelector('#edit_judul_jadwal_kajian').value = judul;
                editKajianForm.querySelector('#edit_tanggal_jadwal_kajian').value = tanggal;
                editKajianForm.querySelector('#edit_pengisi_jadwal_kajian').value = pengisi;
                editKajianForm.querySelector('#edit_deskripsi_jadwal_kajian').value = deskripsi;
            });

            document.querySelectorAll('.detail-kajian-btn').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('judul_jadwal_kajian_detail').value = this.dataset
                        .judul;
                    document.getElementById('tanggal_jadwal_kajian_detail').value = this.dataset
                        .tanggal;
                    document.getElementById('pengisi_jadwal_kajian_detail').value = this.dataset
                        .pengisi;
                    document.getElementById('deskripsi_jadwal_kajian_detail').value = this.dataset
                        .deskripsi;
                });
            });
        });
    </script>
@endsection
