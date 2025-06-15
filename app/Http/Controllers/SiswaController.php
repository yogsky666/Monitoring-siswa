<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\Bimbingan;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $search = request('search');
        $kelasFilter = request('kelas');

        $kelasList = Kelas::pluck('kode_kelas')->toArray();

        $siswaQuery = Siswa::with(['user', 'kelas'])
            ->select('siswa.*')
            ->leftJoin('pelanggaran', 'pelanggaran.kode_siswa', '=', 'siswa.nisn')
            ->leftJoin('sanksi', 'sanksi.id', '=', 'pelanggaran.id_sanksi')
            ->leftJoin('bimbingan', 'bimbingan.kode_siswa', '=', 'siswa.nisn')
            ->leftJoin('introspeksi', 'introspeksi.id', '=', 'bimbingan.id_perbaikan')
            ->selectRaw('COALESCE(SUM(sanksi.point_pelanggar),0) as total_point_pelanggar')
            ->selectRaw('COALESCE(SUM(introspeksi.point_introspeksi), 0) as total_point_perbaikan')
            ->groupBy('siswa.nisn');

        if ($search) {
            $siswaQuery->where('nisn', 'like', "%{$search}%")
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })
                ->orWhereHas('kelas', function ($q) use ($search) {
                    $q->where('kode_kelas', 'like', "%{$search}%")
                        ->orWhere('nama_kelas', 'like', "%{$search}%");
                });
        }

        if ($kelasFilter) {
            $siswaQuery->where('siswa.id_kelas', $kelasFilter);
        }

        // Jalankan query dan ambil semua data sekaligus jumlah pelanggaran/perbaikan
        $siswaList = $siswaQuery->paginate(20);

        return view('siswa.detail', [
            'judul' => 'Daftar Siswa',
            'siswa' => $siswaList,
            'search' => $search,
            'kelasList' => $kelasList,
            'selectedKelas' => $kelasFilter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('level', 'siswa')->get();
        $kelases = Kelas::all();

        return view('siswa.input', compact('users', 'kelases'), ['judul' => 'Input Siswa']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:user,username',
            'id_kelas' => 'required|exists:kelas,kode_kelas',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'id_kelas' => $request->id_kelas,
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($nisn)
    {
        $siswa = Siswa::with(['user', 'kelas'])->findOrFail($nisn);
        return view('siswa.detail', compact('siswa'));
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
        //
    }
}
