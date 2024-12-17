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
    
        if (!Auth::attempt($request->only('username', 'password'))) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }
    
        return redirect()->route('admin.dashboard')->with('success', 'Login successful as admin.');
    }
}