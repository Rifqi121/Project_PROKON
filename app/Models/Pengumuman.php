<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul_pengumuman',
        'desc_pengumuman',
        'id_image_pengumuman',
        'tgl_pengumuman',
        'image',
    ];

    public function image()
    {
        return $this->belongsTo(GambarPengumuman::class, 'id_image_pengumuman');
    }
}