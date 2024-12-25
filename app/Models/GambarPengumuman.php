<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPengumuman extends Model
{
    use HasFactory;

    protected $table = 'gambar_pengumuman';

    protected $fillable = [
        'nama_gambar_pengumuman',
    ];

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'id_image_pengumuman');
    }
}