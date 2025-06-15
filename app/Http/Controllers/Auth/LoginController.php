<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Debug: Tampilkan data user dan password input
        /**dd([
            'input' => $request->only('username', 'password'),
            'user' => $user,
            'password_hash_match' => $user ? Hash::check($request->password, $user->password) : false,
        ]); **/

        // Periksa apakah user ada dan password cocok
        /**if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ]);
        } **/

        // Simpan session login
        Auth::login($user);

        // Redirect sesuai level
        if (in_array($user->level, ['admin', 'guru'])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors([
                'username' => 'Anda tidak memiliki akses ke dashboard.',
            ]);
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
