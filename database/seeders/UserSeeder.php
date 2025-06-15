<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'nama' => 'Admin Utama',
            'level' => 'admin',
            'j_kel' => 'laki-laki',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'guru',
            'nama' => 'Guru Contoh',
            'level' => 'guru',
            'j_kel' => 'perempuan',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'siswa',
            'nama' => 'Siswa Teladan',
            'level' => 'siswa',
            'j_kel' => 'laki-laki',
            'password' => Hash::make('password'),
        ]);
    }
}
