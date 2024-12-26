<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function laporan()
    {
        return view('laporan');
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