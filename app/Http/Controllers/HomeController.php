<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class HomeController extends Controller
{
    // Fungsi untuk halaman utama
    public function index()
    {
        return view('homepage');
    }
    public function kegiatan()
    {
        return view('kegiatan');
    }
    public function shodaqoh()
    {
        return view('shodaqoh');
    }
    public function laporan(Request $request)
    {
        $keyword = $request->input('search');

        $reports = Report::when($keyword, function ($query, $keyword) {
            $query->where('judul_laporan', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $reports->appends(['search' => $keyword]);

        return view('laporan', compact('reports', 'keyword'));
    }
    public function jadwalsholat()
    {
        return view('jadwalsholat');
    }
    public function layanan()
    {
        return view('layanan');
    }
    public function pengumuman()
    {
        return view('pengumuman');
    }
    public function agenda()
    {
        return view('agenda');
    }
    public function jadwaljumat()
    {
        return view('jadwaljumat');
    }
    public function jadwalkajian()
    {
        return view('jadwalkajian');
    }
}