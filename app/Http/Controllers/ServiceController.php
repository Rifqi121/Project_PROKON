<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $services = Service::when($keyword, function ($query, $keyword) {
            $query->where('layanan_name', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $services->appends(['search' => $keyword]);

        return view('admin.layanan', compact('services', 'keyword'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_name' => 'required|string|max:255',
        ]);

        $layanan = new Service();
        $layanan->layanan_name = $request->layanan_name;
        $layanan->save();


        return redirect()->route('adminLayanan')->with('success', 'Layanan Berhasil Ditambahkan');
    }

    public function update(Request $request, Service $service)
    {
        
        $request->validate([
            'layanan_name' => 'required|string|max:255',
        ]);

        $validatedData = ['layanan_name' => $request->input('layanan_name')];

        // Cek jika ada perubahan data
        if ($service->layanan_name === $validatedData['layanan_name']) {
            return redirect()->route('adminLayanan')
                            ->with('info', 'Tidak ada perubahan data.');
        }

        // Update dan cek hasilnya
        $updated = $service->update($validatedData);

        if ($updated) {
            return redirect()->route('adminLayanan')
                            ->with('success', 'Layanan Berhasil Diperbarui');
        } else {
            return redirect()->route('adminLayanan')
                            ->with('error', 'Gagal memperbarui layanan.');
        }
    }


    public function delete(Service $service){

        $service->delete();

        return redirect()->route('adminLayanan')->with('status', 'Layanan Berhasil Dihapus');

    }
}