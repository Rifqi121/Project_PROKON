<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    // Menampilkan semua agenda
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $agendas = Agenda::when($keyword, function ($query, $keyword) {
            $query->where('judul_agenda', 'LIKE', "%{$keyword}%");
        })->paginate(5);

        $agendas->appends(['search' => $keyword]);

        return view('admin.agenda', compact('agendas', 'keyword'));
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul_agenda' => 'required|string|max:100',
            'tanggal_agenda' => 'required|date',
            'waktu_mulai_agenda' => 'required|date_format:H:i',
            'waktu_akhir_agenda' => 'required|date_format:H:i|after_or_equal:waktu_mulai_agenda',
            'penanggung_jawab_agenda' => 'required|string|max:50',
        ]);
    
        Agenda::create([
            'judul_agenda' => $request->judul_agenda,
            'tanggal_agenda' => $request->tanggal_agenda,
            'waktu_mulai_agenda' => $request->waktu_mulai_agenda,
            'waktu_akhir_agenda' => $request->waktu_akhir_agenda,
            'penanggung_jawab_agenda' => $request->penanggung_jawab_agenda,
        ]);
    
        return redirect()->route('agenda')->with('success', 'Agenda berhasil ditambahkan.');
    }
    
    public function update(Request $request, Agenda $agenda)
    {
        // Validasi input
        $request->validate([
            'judul_agenda' => 'required|string|max:100',
            'tanggal_agenda' => 'required|date',
            'waktu_mulai_agenda' => 'required|date_format:H:i',
            'waktu_akhir_agenda' => 'required|date_format:H:i|after_or_equal:waktu_mulai_agenda',
            'penanggung_jawab_agenda' => 'required|string|max:50',
        ]);

        // Ambil data yang telah divalidasi
        $validatedData = [
            'judul_agenda' => $request->input('judul_agenda'),
            'tanggal_agenda' => $request->input('tanggal_agenda'),
            'waktu_mulai_agenda' => $request->input('waktu_mulai_agenda'),
            'waktu_akhir_agenda' => $request->input('waktu_akhir_agenda'),
            'penanggung_jawab_agenda' => $request->input('penanggung_jawab_agenda'),
        ];

        
        // Cek apakah ada perubahan data
        if ($agenda->judul_agenda === $validatedData['judul_agenda'] &&
        $agenda->tanggal_agenda === $validatedData['tanggal_agenda'] &&
        $agenda->waktu_mulai_agenda === $validatedData['waktu_mulai_agenda'] &&
        $agenda->waktu_akhir_agenda === $validatedData['waktu_akhir_agenda'] &&
        $agenda->penanggung_jawab_agenda === $validatedData['penanggung_jawab_agenda']) {
            return redirect()->route('agenda')
            ->with('error', 'Tidak ada perubahan data.');
        }
        
        $updated = $agenda->update($validatedData);

        if ($updated) {
            return redirect()->route('agenda')
                            ->with('success', 'Agenda Berhasil Diperbarui');
        } else {
            return redirect()->route('agenda')
                            ->with('error', 'Gagal memperbarui agenda.');
        }
    }
    
    // Menghapus agenda
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agendas.index')->with('success', 'Agenda berhasil dihapus.');
    }
}