<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JumatSchedule extends Model
{
    use HasFactory;

    protected $table = 'jumat_schedule';

    protected $fillable = ['khotib_jadwal_jumat', 'muadzin_jadwal_jumat', 'tanggal_jadwal_jumat'];
}