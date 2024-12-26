@extends('app')

@section('content')
    <div class="card h-100" style="background-color: #2A332E;">
        <div class="p-4">
            <h2 style="font-size: 1.5rem; font-weight: bold; color: #FBFADA; margin-bottom: 1.5rem;">Laporan</h2>
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
                        <input type="text" class="form-control" placeholder="Laporan Jumat">
                    </div>
                </div>
                <div class="scrollable-tabel" style="background-color: #374139;">
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
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->judul_laporan }}</td>
                                    <td>{{ $report->tanggal_laporan }}</td>
                                    <td>{{ $report->jumlah_laporan }}</td>
                                    <td>{{ $report->jenis_laporan }}</td>
                                </tr>
                            @endforeach
                    </table>
                </div>

            </div>
            {{ $reports->links() }}
        </div>
    </div>
@endsection
