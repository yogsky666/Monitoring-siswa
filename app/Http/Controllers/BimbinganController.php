<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use App\Models\Bimbingan;
use App\Models\Introspeksi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('id'); // Aktifkan lokal bahasa Indonesia
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Bimbingan::query()->orderby('updated_at', 'desc')->with(['siswa', 'introspeksi']);
        $bimbingan = $query->paginate(20);

        return view('bimbingan.index', [
            'judul' => 'Daftar Bimbingan',
            'bimbingan' => $bimbingan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $introspeksi = Introspeksi::all();
        $bimbingan = Bimbingan::all();

        return view('bimbingan.insert', compact('siswa', 'introspeksi'), [
            'judul' => 'Input Bimbingan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_siswa' => 'required|exists:siswa,nisn',
            'id_perbaikan' => 'required|exists:introspeksi,id',
        ]);

        Bimbingan::create([
            'kode_siswa' => $request->kode_siswa,
            'id_perbaikan' => $request->id_perbaikan,
        ]);

        return redirect()->route('bimbingan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nisn)
    {
        $bimbingan = Bimbingan::with(['siswa', 'introspeksi'])->findOrFail($nisn);
        return view('bimbingan.index', compact('bimbingan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $bimbingan->delete();

        return redirect()->route('bimbingan.index')->with('success', 'Data bimbingan berhasil ditambahkan.');
    }
}
