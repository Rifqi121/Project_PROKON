<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JumatSchedule;
use Illuminate\Validation\Rule;

class JumatScheduleController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $JumatSchedules = JumatSchedule::when($keyword, function ($query, $keyword) {
            $query->where('tanggal_jadwal_jumat', 'LIKE', "%{$keyword}%");
        })->paginate(5);

        $JumatSchedules->appends(['search' => $keyword]);

        return view('admin.jadwaljumat', compact('JumatSchedules', 'keyword'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'khotib_jadwal_jumat' => 'required',
            'muadzin_jadwal_jumat' => 'required',
            'tanggal_jadwal_jumat' => 'required|date|unique:jumat_schedule,tanggal_jadwal_jumat',
        ]);

        $tanggal = $request->input('tanggal_jadwal_jumat');
        $dayOfWeek = date('N', strtotime($tanggal));

        if ($dayOfWeek != 5) {
            return redirect()->back()->withErrors([
                'tanggal_jadwal_jumat' => 'Silahkan pilih tanggal dihari Jumat.',
            ])->withInput();
        }

        $jadwal = new JumatSchedule();
        $jadwal->khotib_jadwal_jumat = $request->khotib_jadwal_jumat;
        $jadwal->muadzin_jadwal_jumat = $request->muadzin_jadwal_jumat;
        $jadwal->tanggal_jadwal_jumat = $tanggal;
        $jadwal->save();

        return redirect()->route('JumatSchedules')->with('success', 'Jadwal Berhasil Ditambahkan');
    }

    public function update(Request $request, JumatSchedule $JumatSchedule)
    {

        // Validasi input dengan pengecualian untuk ID saat ini
        $request->validate([
            'khotib_jadwal_jumat' => 'required',
            'muadzin_jadwal_jumat' => 'required',
            'tanggal_jadwal_jumat' => [
                'required',
                'date',
                Rule::unique('jumat_schedule', 'tanggal_jadwal_jumat')->ignore($JumatSchedule->id),
            ],
        ]);
    
        // Data yang sudah tervalidasi
        $validatedData = $request->only([
            'khotib_jadwal_jumat',
            'muadzin_jadwal_jumat',
            'tanggal_jadwal_jumat',
        ]);
    
        // Perbarui data dan cek hasil
        $JumatSchedule->fill($validatedData);
        if ($JumatSchedule->isDirty()) {
            $JumatSchedule->save();
            return redirect()->route('JumatSchedules')
                             ->with('success', 'Jadwal berhasil diperbarui.');
        }
    
        return redirect()->route('JumatSchedules')
                         ->with('info', 'Tidak ada perubahan pada data.');
    }
    
    public function delete(JumatSchedule $JumatSchedule){

        $JumatSchedule->delete();

        return redirect()->route('JumatSchedules')->with('success', 'Layanan Berhasil Dihapus');

    }

}