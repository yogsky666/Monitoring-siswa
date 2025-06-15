<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Sanksi;
use App\Models\Introspeksi;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\Bimbingan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KelasSeeder::class,
            SanksiSeeder::class,
            IntrospeksiSeeder::class,
            SiswaSeeder::class,
            PelanggaranSeeder::class,
            BimbinganSeeder::class
        ]);
    }
}
