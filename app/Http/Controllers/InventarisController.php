<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;

class InventarisController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $inventaris = Inventaris::when($keyword, function ($query, $keyword) {
            $query->where('nama_barang', 'LIKE', "%{$keyword}%");
        })->paginate(5);

        $inventaris->appends(['search' => $keyword]);

        return view('admin.inventaris', compact('inventaris', 'keyword'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|numeric|min:0',
        ]);

        $inventory = new Inventaris();
        $inventory->nama_barang = $request->nama_barang;
        $inventory->jumlah_barang = $request->jumlah_barang;
        $inventory->save();


        return redirect()->route('inventaris')->with('success', 'Barang Berhasil Ditambahkan');
    }

    public function update(Request $request, Inventaris $inventaris)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|numeric|min:0',
        ]);
    
        if (
            $inventaris->nama_barang === $validatedData['nama_barang'] &&
            $inventaris->jumlah_barang == $validatedData['jumlah_barang']
        ) {
            return redirect()->route('inventaris')
                            ->with('info', 'Tidak ada perubahan data.');
        }
    
        try {
            $inventaris->update($validatedData);
    
            return redirect()->route('inventaris')
                            ->with('success', 'Inventaris berhasil diperbarui.');
        } catch (\Exception $e) {
    
            return redirect()->route('inventaris')
                            ->with('error', 'Terjadi kesalahan saat memperbarui inventaris.');
        }
    }

    public function delete(Inventaris $inventaris){

        $inventaris->delete();

        return redirect()->route('inventaris')->with('status', 'Barang Berhasil Dihapus');

    }
    

}