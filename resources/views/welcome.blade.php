@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center px-4">
        <div class="text-center max-w-xl">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4">Selamat Datang di Aplikasi Kami</h1>
            <p class="text-lg text-gray-700 mb-8">Platform manajemen anggota yang mudah digunakan untuk Admin, Guru, dan
                Siswa.</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                    Register
                </a>
            </div>
        </div>
    </div>
@endsection
