@extends('admin.admin')

@section('data')
    <h1>Data Agenda</h1>
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
            <form action="{{ route('agenda') }}" method="GET" style="width: 100%;">
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
            <button class="btn tambah mb-2" data-bs-toggle="modal" data-bs-target="#tambahAgendaModal">
                <i class="bi bi-plus"></i>Tambah Agenda
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
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Penanggung Jawab</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->judul_agenda }}</td>
                        <td>{{ $agenda->tanggal_agenda }}</td>
                        <td>{{ $agenda->waktu_mulai_agenda }}</td>
                        <td>{{ $agenda->waktu_akhir_agenda }}</td>
                        <td>{{ $agenda->penanggung_jawab_agenda }}</td>
                        <td>
                            <!-- Tombol Detail -->
                            <button class="btn btn-primary btn-sm detail-agenda-btn" data-bs-toggle="modal"
                                data-bs-target="#detailAgendaModal" data-id="{{ $agenda->id }}"
                                data-judul="{{ $agenda->judul_agenda }}" data-tanggal="{{ $agenda->tanggal_agenda }}"
                                data-waktu_mulai="{{ $agenda->waktu_mulai_agenda }}"
                                data-waktu_akhir="{{ $agenda->waktu_akhir_agenda }}"
                                data-penanggung_jawab="{{ $agenda->penanggung_jawab_agenda }}">
                                Detail
                            </button>


                            <!-- Tombol Edit Agenda -->
                            <button type="button" class="btn btn-warning btn-sm edit-agenda-btn" data-bs-toggle="modal"
                                data-bs-target="#editAgendaModal" data-id="{{ $agenda->id }}"
                                data-judul="{{ $agenda->judul_agenda }}" data-tanggal="{{ $agenda->tanggal_agenda }}"
                                data-waktu_mulai="{{ $agenda->waktu_mulai_agenda }}"
                                data-waktu_akhir="{{ $agenda->waktu_akhir_agenda }}"
                                data-penanggung_jawab="{{ $agenda->penanggung_jawab_agenda }}">
                                Edit
                            </button>

                            <button class="btn btn-danger btn-sm">Hapus</button>
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

    <!-- Modal Tambah Agenda -->
    <div class="modal fade" id="tambahAgendaModal" tabindex="-1" aria-labelledby="tambahAgendaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahAgendaModalLabel">Tambah Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('agenda.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Judul Agenda -->
                        <div class="mb-3">
                            <label for="judul_agenda" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="judul_agenda" name="judul_agenda" required>
                        </div>

                        <!-- Tanggal Agenda -->
                        <div class="mb-3">
                            <label for="tanggal_agenda" class="form-label">Tanggal Agenda</label>
                            <input type="date" class="form-control" id="tanggal_agenda" name="tanggal_agenda" required>
                        </div>

                        <!-- Waktu Mulai Agenda -->
                        <div class="mb-3">
                            <label for="waktu_mulai_agenda" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="waktu_mulai_agenda" name="waktu_mulai_agenda"
                                required>
                        </div>

                        <!-- Waktu Akhir Agenda -->
                        <div class="mb-3">
                            <label for="waktu_akhir_agenda" class="form-label">Waktu Akhir</label>
                            <input type="time" class="form-control" id="waktu_akhir_agenda" name="waktu_akhir_agenda"
                                required>
                        </div>

                        <!-- Penanggung Jawab Agenda -->
                        <div class="mb-3">
                            <label for="penanggung_jawab_agenda" class="form-label">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="penanggung_jawab_agenda"
                                name="penanggung_jawab_agenda" required>
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


    <!-- Modal Edit Agenda -->
    <div class="modal fade" id="editAgendaModal" tabindex="-1" aria-labelledby="editAgendaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAgendaModalLabel">Edit Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAgendaForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Judul Agenda -->
                        <div class="mb-3">
                            <label for="edit_judul_agenda" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="edit_judul_agenda" name="judul_agenda"
                                required>
                        </div>

                        <!-- Tanggal Agenda -->
                        <div class="mb-3">
                            <label for="edit_tanggal_agenda" class="form-label">Tanggal Agenda</label>
                            <input type="date" class="form-control" id="edit_tanggal_agenda" name="tanggal_agenda"
                                required>
                        </div>

                        <!-- Waktu Mulai Agenda -->
                        <div class="mb-3">
                            <label for="edit_waktu_mulai_agenda" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="edit_waktu_mulai_agenda"
                                name="waktu_mulai_agenda" required>
                        </div>

                        <!-- Waktu Akhir Agenda -->
                        <div class="mb-3">
                            <label for="edit_waktu_akhir_agenda" class="form-label">Waktu Akhir</label>
                            <input type="time" class="form-control" id="edit_waktu_akhir_agenda"
                                name="waktu_akhir_agenda" required>
                        </div>

                        <!-- Penanggung Jawab Agenda -->
                        <div class="mb-3">
                            <label for="edit_penanggung_jawab_agenda" class="form-label">Penanggung Jawab</label>
                            <input type="text" class="form-control" id="edit_penanggung_jawab_agenda"
                                name="penanggung_jawab_agenda" required>
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

    <!-- Modal Detail Agenda -->
    <div class="modal fade" id="detailAgendaModal" tabindex="-1" aria-labelledby="detailAgendaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailAgendaModalLabel">Detail Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="detail_judul_agenda" class="form-label">Judul Agenda</label>
                        <input type="text" class="form-control" id="detail_judul_agenda" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="detail_tanggal_agenda" class="form-label">Tanggal Agenda</label>
                        <input type="text" class="form-control" id="detail_tanggal_agenda" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="detail_waktu_mulai_agenda" class="form-label">Waktu Mulai</label>
                        <input type="text" class="form-control" id="detail_waktu_mulai_agenda" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="detail_waktu_akhir_agenda" class="form-label">Waktu Akhir</label>
                        <input type="text" class="form-control" id="detail_waktu_akhir_agenda" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="detail_penanggung_jawab_agenda" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="detail_penanggung_jawab_agenda" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const detailButtons = document.querySelectorAll(".detail-agenda-btn");

            // Modifikasi form dan input untuk modal detail
            const modalForm = document.getElementById("detailAgendaModal");
            const inputJudulDetail = document.getElementById("detail_judul_agenda");
            const inputTanggalDetail = document.getElementById("detail_tanggal_agenda");
            const inputWaktuMulaiDetail = document.getElementById("detail_waktu_mulai_agenda");
            const inputWaktuAkhirDetail = document.getElementById("detail_waktu_akhir_agenda");
            const inputPenanggungJawabDetail = document.getElementById("detail_penanggung_jawab_agenda");

            // Event listener untuk tombol Detail
            detailButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const agendaId = button.getAttribute("data-id");
                    const agendaJudul = button.getAttribute("data-judul");
                    const agendaTanggal = button.getAttribute("data-tanggal");
                    const agendaWaktuMulai = button.getAttribute("data-waktu_mulai");
                    const agendaWaktuAkhir = button.getAttribute("data-waktu_akhir");
                    const agendaPenanggungJawab = button.getAttribute("data-penanggung_jawab");

                    // Update input field untuk modal detail
                    inputJudulDetail.value = agendaJudul;
                    inputTanggalDetail.value = agendaTanggal;
                    inputWaktuMulaiDetail.value = agendaWaktuMulai;
                    inputWaktuAkhirDetail.value = agendaWaktuAkhir;
                    inputPenanggungJawabDetail.value = agendaPenanggungJawab;
                });
            });
        });
    </script>

@endsection
