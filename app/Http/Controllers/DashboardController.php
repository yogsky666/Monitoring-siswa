<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\Bimbingan;
use App\Models\Sanksi;
use App\Models\Introspeksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalPelanggar = Pelanggaran::distinct('kode_siswa')->count('kode_siswa');
        $totalPelanggaran = Pelanggaran::count();

        $pelanggarTerbanyak = Siswa::with(['user', 'kelas'])
            ->select('siswa.*')
            ->leftJoin('pelanggaran', 'pelanggaran.kode_siswa', '=', 'siswa.nisn')
            ->leftJoin('sanksi', 'sanksi.id', '=', 'pelanggaran.id_sanksi')
            ->leftJoin('bimbingan', 'bimbingan.kode_siswa', '=', 'siswa.nisn')
            ->leftJoin('introspeksi', 'introspeksi.id', '=', 'bimbingan.id_perbaikan')
            ->selectRaw('COALESCE(SUM(sanksi.point_pelanggar), 0) as total_point_pelanggar')
            ->selectRaw('COALESCE(SUM(introspeksi.point_introspeksi), 0) as total_point_perbaikan')
            ->selectRaw('(COALESCE(SUM(sanksi.point_pelanggar), 0) - COALESCE(SUM(introspeksi.point_introspeksi), 0)) as total_point_keseluruhan')
            ->selectRaw("
        CASE
            WHEN (COALESCE(SUM(sanksi.point_pelanggar), 0) - COALESCE(SUM(introspeksi.point_introspeksi), 0)) >= 100 THEN 'Siswa Bermasalah'
            WHEN (COALESCE(SUM(sanksi.point_pelanggar), 0) - COALESCE(SUM(introspeksi.point_introspeksi), 0)) BETWEEN 50 AND 99 THEN 'Perlu Perhatian'
            WHEN (COALESCE(SUM(sanksi.point_pelanggar), 0) - COALESCE(SUM(introspeksi.point_introspeksi), 0)) BETWEEN 1 AND 49 THEN 'Masih Aman'
            ELSE 'Tidak Ada Pelanggaran'
        END as desc_point_pelanggar
    ")
            ->groupBy('siswa.nisn')
            ->orderByDesc('total_point_keseluruhan')
            ->take(5)
            ->get();

        $labelPerDayWeekly = Pelanggaran::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('count(kode_siswa) as total, dayname(created_at) as day')
            ->groupBy(DB::raw("DAY(created_at), dayname(created_at)"))
            ->pluck("day");

        $totalPerDayWeekly = Pelanggaran::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->selectRaw('count(kode_siswa) as total, dayname(created_at) as day')
            ->groupBy(DB::raw("DAY(created_at), dayname(created_at)"))
            ->pluck("total");

        $totalPointPelanggar = DB::table('pelanggaran')
            ->join('sanksi', 'sanksi.id', '=', 'pelanggaran.id_sanksi')
            ->whereBetween('pelanggaran.created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->sum('sanksi.point_pelanggar');

        return view('dashboard.index', compact('pelanggarTerbanyak'), [
            'judul' => 'Ripple Dashboard',
            'totalSiswa' => $totalSiswa,
            'totalKelas' => $totalKelas,
            'totalPelanggar' => $totalPelanggar,
            'totalPelanggaran' => $totalPelanggaran,
            'totalPointPelanggar' => $totalPointPelanggar,
            'totalPerDayWeekly' => $totalPerDayWeekly,
            'labelPerDayWeekly' => $labelPerDayWeekly
        ]);
    }
}
