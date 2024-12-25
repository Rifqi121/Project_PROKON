<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Death extends Model
{
    use HasFactory;

    protected $table = 'deaths';

    protected $fillable = ['nama_data_kematian', 'tanggal_data_kematian', 'tempat_data_kematian'];
}