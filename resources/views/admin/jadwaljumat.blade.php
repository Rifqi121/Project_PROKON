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
                    <th>Tanggal</th>
                    <th>Khatib</th>
                    <th>Muadzin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($JumatSchedules as $JumatSchedule)
                    <tr>
                        <td>{{ $JumatSchedule->tanggal_jadwal_jumat }}</td>
                        <td>{{ $JumatSchedule->khotib_jadwal_jumat }}</td>
                        <td>{{ $JumatSchedule->muadzin_jadwal_jumat }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <!-- Tombol Detail -->
                                <button class="btn btn-primary btn-sm detail-jumat-btn" data-bs-toggle="modal"
                                    data-bs-target="#detailJumatanModal" data-id="{{ $JumatSchedule->id }}"
                                    data-tanggal="{{ $JumatSchedule->tanggal_jadwal_jumat }}"
                                    data-khotib="{{ $JumatSchedule->khotib_jadwal_jumat }}"
                                    data-muadzin="{{ $JumatSchedule->muadzin_jadwal_jumat }}">
                                    Detail
                                </button>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-warning btn-sm edit-jumat-btn" data-bs-toggle="modal"
                                    data-bs-target="#editJumatanModal" data-id="{{ $JumatSchedule->id }}"
                                    data-tanggal="{{ $JumatSchedule->tanggal_jadwal_jumat }}"
                                    data-khotib="{{ $JumatSchedule->khotib_jadwal_jumat }}"
                                    data-muadzin="{{ $JumatSchedule->muadzin_jadwal_jumat }}">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('JumatSchedules.delete', $JumatSchedule->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{ $JumatSchedules->links() }}
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
    <div class="modal fade" id="tambahJumatanModal" tabindex="-1" aria-labelledby="tambahJumatanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJumatanModalLabel">Tambah Jumatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('JumatSchedules.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tanggal_jadwal_jumat" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_jadwal_jumat" name="tanggal_jadwal_jumat"
                                required>
                        </div>
                        <div>
                            <label for="khotib_jadwal_jumat" class="form-label">Khatib</label>
                            <input type="text" class="form-control" id="khotib_jadwal_jumat" name="khotib_jadwal_jumat"
                                required>
                        </div>
                        <div>
                            <label for="khotib_jadwal_jumat" class="form-label">Muadzin</label>
                            <input type="text" class="form-control" id="muadzin_jadwal_jumat" name="muadzin_jadwal_jumat"
                                required>
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

    <!-- Modal Edit Jumat -->
    <div class="modal fade" id="editJumatanModal" tabindex="-1" aria-labelledby="editJumatanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="#" method="POST" id="editJumatForm">
                @csrf
                @method('PUT')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJumatanModalLabel">Edit Jadwal Jumatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="hidden_tanggal_jumat" name="tanggal_jadwal_jumat" />

                        <div class="mb-3">
                            <label for="edit_tanggal_jumat">Tanggal</label>
                            <input type="date" id="edit_tanggal_jumat" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="edit_khotib_jumat">Khotib</label>
                            <input type="text" id="edit_khotib_jumat" name="khotib_jadwal_jumat" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_muadzin_jumat">Muadzin</label>
                            <input type="text" id="edit_muadzin_jumat" name="muadzin_jadwal_jumat"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Detail Jumatan -->
    <div class="modal fade" id="detailJumatanModal" tabindex="-1" aria-labelledby="detailJumatanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailJumatanModalLabel">Jumatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="GET" id="detailJumatForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="detail_tanggal_jumat">Tanggal</label>
                            <input type="date" id="detail_tanggal_jumat" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detail_khotib_jumat">Khotib</label>
                            <input type="text" id="detail_khotib_jumat" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="detail_muadzin_jumat">Muadzin</label>
                            <input type="text" id="detail_muadzin_jumat" class="form-control" readonly>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-jumat-btn');
            const detailButtons = document.querySelectorAll('.detail-jumat-btn');

            // Modifikasi form dan input untuk modal edit
            const editModalForm = document.getElementById("editJumatForm");
            const inputDateEdit = document.getElementById("edit_tanggal_jumat");
            const hiddenDateInput = document.getElementById("hidden_tanggal_jumat");
            const inputKhotibEdit = document.getElementById("edit_khotib_jumat");
            const inputMuadzinEdit = document.getElementById("edit_muadzin_jumat");

            // Modifikasi input untuk modal detail (tanpa form)
            const inputDateDetail = document.getElementById("detail_tanggal_jumat");
            const inputKhotibDetail = document.getElementById("detail_khotib_jumat");
            const inputMuadzinDetail = document.getElementById("detail_muadzin_jumat");

            // Event listener untuk tombol Edit
            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const jumatId = button.getAttribute("data-id");
                    const jumatDate = button.getAttribute("data-tanggal");
                    const jumatKhotib = button.getAttribute("data-khotib");
                    const jumatMuadzin = button.getAttribute("data-muadzin");

                    // Update form action URL untuk modal edit
                    editModalForm.action = `/admin/DataKegiatan/JadwalJumat/${jumatId}`;

                    // Update input field untuk modal edit
                    inputDateEdit.value = jumatDate;
                    hiddenDateInput.value = jumatDate;
                    inputKhotibEdit.value = jumatKhotib;
                    inputMuadzinEdit.value = jumatMuadzin;
                });
            });

            // Event listener untuk tombol Detail
            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const jumatDate = button.getAttribute("data-tanggal");
                    const jumatKhotib = button.getAttribute("data-khotib");
                    const jumatMuadzin = button.getAttribute("data-muadzin");

                    // Update input field untuk modal detail
                    inputDateDetail.value = jumatDate;
                    inputKhotibDetail.value = jumatKhotib;
                    inputMuadzinDetail.value = jumatMuadzin;
                });
            });
        });
    </script>


@endsection
