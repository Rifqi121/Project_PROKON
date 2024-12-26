<?php

namespace App\Http\Controllers;

use App\Services\MyQuran;

class MyQuranController extends Controller
{
    protected $quranService;

    public function __construct(MyQuran $quranService)
    {
        $this->quranService = $quranService;
    }

    public function listSurah()
    {
        $data = $this->quranService->getSurahList();

        // return response()->json($data);
        return view('homepage', ['surahs' => $data]);
    }

    public function detailSurah($id)
    {
        $datas = $this->quranService->getSurahDetail($id);
        $data =  $datas['data'] ?? [];
        
        return view('homepage', ['surah' => $data]);
    }

    public function jadwalSholat($kota, $tahun, $bulan, $tanggal)
    {
        $response = $this->quranService->getJadwalSholat($kota, $tahun, $bulan, $tanggal);
        dd($response);

        $data = $response['data'] ?? [];

        return view('jadwal_sholat', compact('data'));
    }
}