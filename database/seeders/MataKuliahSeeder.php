<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_mk' => 'Pemrograman Web Lanjut', 'sks' => 3],
            ['nama_mk' => 'Basis Data', 'sks' => 3],
            ['nama_mk' => 'Analisis dan Perancangan Sistem', 'sks' => 3],
        ];

        foreach ($data as $item) {
            MataKuliah::create($item);
        }
    }
}