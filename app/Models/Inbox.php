<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'jenis_surat',
        'tanggal_kirim',
        'tanggal_terima',
        'no_surat',
        'pengirim',
        'perihal',
        'foto'
    ];
}
