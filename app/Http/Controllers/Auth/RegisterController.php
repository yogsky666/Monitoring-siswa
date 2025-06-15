<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Auth
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'username' => 'required|string|max:20|unique:user',
            'nama' => 'required|string',
            'level' => 'required|in:admin,guru,siswa',
            'j_kel' => 'required|in:laki-laki,perempuan',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Debugging: Tampilkan semua data yang diterima
        // dd($validated);

        // Simpan user ke database
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'level' => $request->level,
            'j_kel' => $request->j_kel,
            'password' => Hash::make($request->password),
        ]);

        // Redirect setelah berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil!');
    }
}
