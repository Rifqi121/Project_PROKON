<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MyQuran
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.myquran.base_url');
    }

    public function fetchData($endpoint, $params = [])
    {
        $response = Http::get("{$this->baseUrl}/{$endpoint}", $params);
        
        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => true,
            'message' => $response->body(),
        ];
    }

    public function getSurahList($params = [])
    {
        return $this->fetchData('quran/surat/semua', $params);
    }

    public function getSurahDetail($id)
    {
        $response = Http::get("{$this->baseUrl}/quran/surat/{$id}");

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => true,
            'message' => $response->body(),
        ];
    }

    public function getJadwalSholat($kota, $tahun, $bulan, $tanggal)
    {
        $url = "{$this->baseUrl}/sholat/jadwal/{$kota}/{$tahun}/{$bulan}/{$tanggal}";
        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => true,
            'message' => $response->body(),
        ];
    }
}