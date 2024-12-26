<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{   
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $pengumumans = Pengumuman::when($keyword, function ($query, $keyword) {
            $query->where('judul_pengumuman', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $pengumumans->appends(['search' => $keyword]);

        return view('admin.pengumuman', compact('pengumumans', 'keyword'));
    }

    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'desc_pengumuman' => 'required|string',
            'tgl_pengumuman' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Membuat instance baru dari model Pengumuman
        $pengumuman = new Pengumuman();
        $pengumuman->judul_pengumuman = $request->judul_pengumuman;
        $pengumuman->desc_pengumuman = $request->desc_pengumuman;
        $pengumuman->tgl_pengumuman = $request->tgl_pengumuman;

        // Simpan data terlebih dahulu untuk mendapatkan ID
        $pengumuman->save();

        // Jika ada file gambar yang diupload
        if ($request->hasFile('image')) {
            // Generate nama file unik
            $originalExtension = $request->file('image')->getClientOriginalExtension(); // Dapatkan ekstensi asli
            $uniqueName = 'img_' . uniqid() . '.' . $originalExtension; // Nama file unik

            // Simpan file dengan nama baru
            $imagePath = $request->file('image')->storeAs('pengumumans', $uniqueName, 'public');
            $pengumuman->image = $imagePath;

            // Simpan kembali data untuk mengupdate path gambar
            $pengumuman->save();
        }

        // Redirect ke halaman daftar pengumuman dengan pesan sukses
        return redirect()->route('pengumuman')->with('success', 'Pengumuman created successfully');
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'desc_pengumuman' => 'required|string',
            'tgl_pengumuman' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Data yang valid
        $validatedData = [
            'judul_pengumuman' => $request->input('judul_pengumuman'),
            'desc_pengumuman' => $request->input('desc_pengumuman'),
            'tgl_pengumuman' => $request->input('tgl_pengumuman'),
        ];

        
        // Jika ada file image yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->image) {
                Storage::disk('public')->delete($pengumuman->image);
            }

            // Generate nama file unik
            $originalExtension = $request->file('image')->getClientOriginalExtension(); // Dapatkan ekstensi asli
            $uniqueName = 'img_' . uniqid() . '.' . $originalExtension; // Nama file unik

            // Simpan gambar baru dengan nama unik
            $imagePath = $request->file('image')->storeAs('pengumumans', $uniqueName, 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update data
        $pengumuman->update($validatedData);

        // Redirect ke rute 'pengumuman' dengan pesan sukses
        return redirect()->route('pengumuman')
                        ->with('success', 'Pengumuman berhasil diubah!');
    }

    public function delete(Pengumuman $pengumuman)
{
    // Hapus file gambar jika ada
    if ($pengumuman->image) {
        Storage::disk('public')->delete($pengumuman->image);
    }

    // Hapus data pengumuman dari database
    $pengumuman->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('pengumuman')
        ->with('success', 'Pengumuman berhasil dihapus!');
}


    
}