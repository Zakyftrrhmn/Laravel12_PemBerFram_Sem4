<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'jenis_surat',
        'tanggal_kirim',
        'no_surat',
        'pengirim',
        'perihal',
    ];
}
