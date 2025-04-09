<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inboxes')->insert([
            'no_agenda' => '1',
            'jenis_surat' => 'rapat',
            'tanggal_kirim' => '2025-03-10',
            'tanggal_terima' => '2025-03-10',
            'no_surat' => '001/PNP/MI/2025',
            'pengirim' => 'Zaky',
            'perihal' => '-',
            'foto' => null,
            'relasi' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('inboxes')->insert([
            'no_agenda' => '2',
            'jenis_surat' => 'rapat',
            'tanggal_kirim' => '2025-03-10',
            'tanggal_terima' => '2025-03-10',
            'no_surat' => '002/PNP/MI/2025',
            'pengirim' => 'Fathur',
            'perihal' => '-',
            'foto' => null,
            'relasi' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('inboxes')->insert([
            'no_agenda' => '3',
            'jenis_surat' => 'rapat',
            'tanggal_kirim' => '2025-03-10',
            'tanggal_terima' => '2025-03-10',
            'no_surat' => '003/PNP/MI/2025',
            'pengirim' => 'Rahman',
            'perihal' => '-',
            'foto' => null,
            'relasi' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
