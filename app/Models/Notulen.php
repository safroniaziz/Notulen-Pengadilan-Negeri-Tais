<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;
    protected $dates = ['tanggal'];
    protected $fillable = [
        'notulis_id',
        'hari',
        'tanggal',
        'tempat',
        'peserta',
        'materi_rapat',
        'risalah_rapat',
    ];
}
