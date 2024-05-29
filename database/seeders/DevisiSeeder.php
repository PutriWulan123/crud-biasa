<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devisi = [
            ['nama_devisi' => 'HRD'],
            ['nama_devisi' => 'Keuangan'],
            ['nama_devisi' => 'Pemasaran'],
            ['nama_devisi' => 'Produksi'],
            ['nama_devisi' => 'Umum'],
            ['nama_devisi' => 'Teknologi dan Informasi'],
            // Tambahkan data devisi lainnya sesuai kebutuhan
        ];

        // Insert data devisi ke tabel 'divisions'
        DB::table('devisis')->insert($devisi);
    }
}
