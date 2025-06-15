<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use App\Models\Pelanggaran;
use App\Models\Sanksi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale('id'); // Aktifkan lokal bahasa Indonesia
    }

    public function index()
    {
        $query = Pelanggaran::query()->orderby('updated_at', 'desc')->with(['siswa', 'sanksi']);
        $pelanggaran = $query->paginate(20);

        return view('pelanggaran.index', [
            'judul' => 'Daftar Pelanggaran',
            'pelanggaran' => $pelanggaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $sanksi = Sanksi::all();
        $pelanggaran = Pelanggaran::all();

        return view('pelanggaran.insert', compact('siswa', 'sanksi'), [
            'judul' => 'Input Pelanggaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_siswa' => 'required|exists:siswa,nisn',
            'id_sanksi' => 'required|exists:sanksi,id',
        ]);

        Pelanggaran::create([
            'kode_siswa' => $request->kode_siswa,
            'id_sanksi' => $request->id_sanksi,
        ]);

        return redirect()->route('pelanggaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($nisn)
    {
        $pelanggaran = Pelanggaran::with(['siswa', 'sanksi'])->findOrFail($nisn);
        return view('pelanggaran.index', compact('pelanggaran'));
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
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();

        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil dihapus.');
    }
}
