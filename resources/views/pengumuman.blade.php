@extends('app')

@section('content')


<div class="card h-100" style="background-color: #2A332E;">
    <div class="p-4">
        <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Pengumuman</h2>
        <div style="background-color: #374139;">
            <div class="container py-2 d-flex justify-content-center align-items-center">
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
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="pengumuman">
                </div>
            </div>
            <div class="scrollable-tabel" style="background-color: #374139;">
                <table class="kegiatan table table-responsive table-striped table-borderless table-hover"
                    style="background-color: #374139;">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th class="d-none d-md-table-cell">Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bersih-Bersih Masjid</td>
                            <td class="text-truncate d-none d-md-table-cell"
                                style="max-width: 200px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus iure, vel quia quos
                                repellendus fugit officia similique ad unde ut, explicabo rerum quasi dolor harum,
                                delectus ducimus a placeat iusto!
                            </td>
                            <td>1/1/2023</td>
                            <td><a href="#" class="btn btn-kegiatan" data-bs-toggle="modal"
                                    data-bs-target="#detailModal">Detail Lengkap</a></td>
                        </tr>
                </table>
                <ul class="lap-page pagination justify-content-center py-1">
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

        </div>
    </div>
</div>

<!-- Modal Detail Pengumuman -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Judul Pengumuman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <p id="deskripsi" name="deskripsi" rows="3" readonly style="resize: none;">Lorem ipsum dolor sit
                            amet consectetur adipisicing elit. Natus iste tempora qui neque, sequi corporis eius error
                            provident quas esse, maxime ipsum a eos quasi obcaecati earum sapiente? Ut, tempore?</p>
                    </div>
                    <div class="mb-3">
                        <span>Tanggal Kegiatan</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
