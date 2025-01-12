<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    // Menampilkan semua laporan
    public function index(Request $request)
{
    $keyword = $request->input('search');

    $reports = Report::when($keyword, function ($query, $keyword) {
        $query->where('judul_laporan', 'LIKE', "%{$keyword}%");
    })->paginate(5);

    $reports->getCollection()->transform(function ($report) {
        $report->formatted_jumlah_laporan = number_format($report->jumlah_laporan, 0, ',', '.');
        return $report;
    });

    $reports->appends(['search' => $keyword]);

    return view('admin.laporan', compact('reports', 'keyword'));
}



    // Menyimpan laporan baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_laporan' => 'required|string|max:100',
            'tanggal_laporan' => 'required|date',
            'jumlah_laporan' => 'required|numeric|min:0',
            'jenis_laporan' => 'required|string|max:50',
        ]);

        Report::create([
            'judul_laporan' => $request->judul_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'jumlah_laporan' => $request->jumlah_laporan,
            'jenis_laporan' => $request->jenis_laporan,
        ]);

        return redirect()->route('laporan')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Memperbarui laporan
    public function update(Request $request, Report $report)
    {
        // Validasi input
        $request->validate([
            'judul_laporan' => 'required|string|max:100',
            'tanggal_laporan' => 'required|date',
            'jumlah_laporan' => 'required|numeric|min:0',
            'jenis_laporan' => 'required|string|max:50',
        ]);

        $validatedData = [
            'judul_laporan' => $request->judul_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'jumlah_laporan' => $request->jumlah_laporan,
            'jenis_laporan' => $request->jenis_laporan,
        ];

        // Cek apakah ada perubahan data
        if ($report->judul_laporan === $validatedData['judul_laporan'] &&
            $report->tanggal_laporan === $validatedData['tanggal_laporan'] &&
            $report->jumlah_laporan === $validatedData['jumlah_laporan'] &&
            $report->jenis_laporan === $validatedData['jenis_laporan']) {
            return redirect()->route('laporan')
                             ->with('error', 'Tidak ada perubahan data.');
        }

        $updated = $report->update($validatedData);

        if ($updated) {
            return redirect()->route('laporan')
                             ->with('success', 'Laporan berhasil diperbarui.');
        } else {
            return redirect()->route('laporan')
                             ->with('error', 'Gagal memperbarui laporan.');
        }
    }

    // Menghapus laporan
    public function delete(Report $report)
    {
        $report->delete();
        return redirect()->route('laporan')->with('success', 'Laporan berhasil dihapus.');
    }
}