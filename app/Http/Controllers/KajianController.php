<?php

namespace App\Http\Controllers;

use App\Models\Kajian;
use Illuminate\Http\Request;

class KajianController extends Controller
{
    public function index(Request $request)
    {
        // Menangkap input pencarian dari parameter search
        $keyword = $request->input('search');

        $kajians = Kajian::when($keyword, function ($query, $keyword) {
            $query->where('judul_jadwal_kajian', 'LIKE', "%{$keyword}%")
                  ->orWhere('pengisi_jadwal_kajian', 'LIKE', "%{$keyword}%");
        })->paginate(5);

        $kajians->appends(['search' => $keyword]);

        return view('admin.kajian', compact('kajians', 'keyword'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'judul_jadwal_kajian' => 'required|string|max:255',
            'tanggal_jadwal_kajian' => 'required|date',
            'pengisi_jadwal_kajian' => 'required|string|max:255',
            'deskripsi_jadwal_kajian' => 'nullable|string',
        ]);

        // Membuat instance baru Kajian dan menyimpan data
        $kajian = new Kajian();
        $kajian->judul_jadwal_kajian = $request->judul_jadwal_kajian;
        $kajian->tanggal_jadwal_kajian = $request->tanggal_jadwal_kajian;
        $kajian->pengisi_jadwal_kajian = $request->pengisi_jadwal_kajian;
        $kajian->deskripsi_jadwal_kajian = $request->deskripsi_jadwal_kajian;
        $kajian->save();

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('kajian')->with('success', 'Kajian Berhasil Ditambahkan');
    }

    public function update(Request $request, Kajian $kajian)
    {

        // Validasi data input
        $request->validate([
            'judul_jadwal_kajian' => 'required|string|max:255',
            'tanggal_jadwal_kajian' => 'required|date',
            'pengisi_jadwal_kajian' => 'required|string|max:255',
            'deskripsi_jadwal_kajian' => 'nullable|string',
        ]);

        // Data yang akan diupdate
        $validatedData = $request->only([
            'judul_jadwal_kajian', 
            'tanggal_jadwal_kajian', 
            'pengisi_jadwal_kajian', 
            'deskripsi_jadwal_kajian'
        ]);
        
        // Update kajian dan cek apakah berhasil
        $updated = $kajian->update($validatedData);

        if ($updated) {
            return redirect()->route('kajian')
                             ->with('success', 'Kajian Berhasil Diperbarui');
        } else {
            return redirect()->route('kajian')
                             ->with('error', 'Gagal memperbarui kajian.');
        }
    }

    public function delete(Kajian $kajian)
    {
        // Menghapus data kajian
        $kajian->delete();

        // Redirect ke halaman utama dengan pesan status
        return redirect()->route('kajian')->with('status', 'Kajian Berhasil Dihapus');
    }
}