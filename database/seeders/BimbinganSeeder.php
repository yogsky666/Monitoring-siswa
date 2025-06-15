<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bimbingan;

class BimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bimbingan::create([
            'id' => 1,
            'kode_siswa' => 'siswa',
            'id_perbaikan' => 1,
        ]);
    }
}
