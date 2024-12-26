<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {   
        return view('admin.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Username tidak ditemukan.'])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        Auth::login($user);

        if ($user->role !== 'admin') {
            Auth::logout();
            return back()->withErrors(['message' => 'Anda tidak memiliki akses sebagai admin.'])->withInput();
        }

        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect('/login')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }        

        return redirect()->route('admin')->with('success', 'Login berhasil sebagai admin.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out user

        // Hapus sesi dan token autentikasi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain
        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }


}