@extends('app')

@section('content')
    <div class="row mt-1" style="height: 75vh;">
        <div class="col-sm-8 h-100 pe-0">
            <div class="card h-100" style="background-color: #2A332E;">
                <div class="container p-4">
                    <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Laporan</h2>
                    <div style="background-color: #374139;">
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
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Laporan Jumat">
                            </div>
                        </div>

                        <table class="laporan table table-responsive table-striped table-borderless table-hover"
                            style="background-color: #374139;">
                            <thead>
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Amount</th>
                                    <th>Jenis Pemasukan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
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
                </div>
            </div>
        </div>
    @endsection
