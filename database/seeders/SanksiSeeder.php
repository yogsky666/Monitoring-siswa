<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sanksi;

class SanksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sanksi::create([
            'id' => 1,
            'desk_kesalahan' => 'Terlambat',
            'point_pelanggar' => 2
        ]);
    }
}
