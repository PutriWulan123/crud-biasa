<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penggajians')->insert([
            'nama_pegawai' => 'Putri Wulan Sari',
            'jenis_kelamin' => 'Perempuan',
            'id_pegawai' => '1',
            'nama_devisi' => 'Keuangan',
            'tunjangan' => 'Kesehatan',
            'gaji_pokok' => '3000000',
            'tanggalbayar' => '2024-03-03',
        ]);

    }
}
