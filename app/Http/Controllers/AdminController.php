<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); 
    }
    public function auth()
    {
        return view('admin.login'); 
    }
    public function layanan()
    {
        return view('admin.layanan');
    }
    public function pengumuman()
    {
        return view('admin.pengumuman');
    }
    public function kajian()
    {
        return view('admin.kajian');
    }
    public function jadwaljumat()
    {
        return view('admin.jadwaljumat');
    }
    public function agenda()
    {
        return view('admin.agenda');
    }
    public function shodaqoh()
    {
        return view('admin/shodaqoh');
    }
    public function laporan()
    {
        return view('admin/laporan');
    }
    public function jadwalsholat()
    {
        return view('admin/jadwalsholat');
    }
}