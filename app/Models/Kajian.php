<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kajian extends Model
{
    use HasFactory;

    protected $table = 'kajian';

    protected $fillable = ['judul_jadwal_kajian', 'tanggal_jadwal_kajian', 'pengisi_jadwal_kajian', 'deskripsi_jadwal_kajian'];
}