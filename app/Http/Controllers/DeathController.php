<?php

namespace App\Http\Controllers;

use App\Models\Death;
use Illuminate\Http\Request;

class DeathController extends Controller
{
    // Menampilkan data kematian
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $deaths = Death::when($keyword, function ($query, $keyword) {
            $query->where('nama_data_kematian', 'LIKE', "%{$keyword}%")
                  ->orWhere('tempat_data_kematian', 'LIKE', "%{$keyword}%");
        })->paginate(5);

        $deaths->appends(['search' => $keyword]);

        return view('admin.kematian', compact('deaths', 'keyword'));
    }

    // Menambahkan data kematian baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_data_kematian' => 'required|string|max:255',
            'tanggal_data_kematian' => 'required|date',
            'tempat_data_kematian' => 'nullable|string|max:255',
        ]);

        Death::create([
            'nama_data_kematian' => $request->nama_data_kematian,
            'tanggal_data_kematian' => $request->tanggal_data_kematian,
            'tempat_data_kematian' => $request->tempat_data_kematian,
        ]);

        return redirect()->route('death')->with('success', 'Data kematian berhasil ditambahkan.');
    }

    // Mengupdate data kematian
    public function update(Request $request, Death $death, $id)
    {
        $death = Death::find($id);
        // Validasi input
        $request->validate([
            'nama_data_kematian' => 'required|string|max:255',
            'tanggal_data_kematian' => 'required|date',
            'tempat_data_kematian' => 'nullable|string|max:255',
        ]);
    
        // Ambil data yang telah divalidasi
        $validatedData = [
            'nama_data_kematian' => $request->input('nama_data_kematian'),
            'tanggal_data_kematian' => $request->input('tanggal_data_kematian'),
            'tempat_data_kematian' => $request->input('tempat_data_kematian'),
        ];
    
        // Cek apakah ada perubahan data
        if ($death->nama_data_kematian === $validatedData['nama_data_kematian'] &&
            $death->tanggal_data_kematian === $validatedData['tanggal_data_kematian'] &&
            $death->tempat_data_kematian === $validatedData['tempat_data_kematian']) {
                return redirect()->route('death')
                                 ->with('error', 'Tidak ada perubahan data.');
        }
    
        // Update data dan cek apakah berhasil
        $updated = $death->update($validatedData);
        
    
        if ($updated) {
            return redirect()->route('death')
                             ->with('success', 'Data kematian berhasil diperbarui.');
        } else {
            return redirect()->route('death')
                             ->with('error', 'Gagal memperbarui data kematian.');
        }
    }

    // Menghapus laporan
    public function delete(Death $death, $id)
    {
        $death = Death::find($id);
        $death->delete();
        return redirect()->route('death')->with('success', 'Laporan berhasil dihapus.');
    }


    
}