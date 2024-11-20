<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Fungsi untuk halaman utama
    public function index()
    {
        return view('homepage'); // Mengarahkan ke view resources/views/homepage.blade.php
    }
}
