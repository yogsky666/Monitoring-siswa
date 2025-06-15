<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Introspeksi;

class IntrospeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Introspeksi::create([
            'id' => 1,
            'desk_introspeksi' => 'Lari 10 kali lapangan',
            'point_introspeksi' => 1,
        ]);
    }
}
