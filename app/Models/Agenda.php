<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = ['judul_agenda', 'tanggal_agenda', 'waktu_mulai_agenda', 'waktu_akhir_agenda', 'penanggung_jawab_agenda'];
}