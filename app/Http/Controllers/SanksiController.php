<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanksi = Sanksi::withCount('pelanggaran')->get();
        return view('sanksi.index', compact('sanksi'), ['judul' => 'Sanksi Pelanggaran']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanksi = new Sanksi;
        $sanksi->desk_kesalahan = $request->desk_kesalahan;
        $sanksi->point_pelanggar = $request->point_pelanggar;
        $sanksi->save();
        return redirect('/kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $sanksi = Sanksi::find($id);
        $sanksi->desk_kesalahan = $request->desk_kesalahan;
        $sanksi->point_pelanggar = $request->point_pelanggar;
        return redirect('/sanksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanksi = Sanksi::find($id);
        $sanksi->delete();

        return redirect('sanksi');
    }
}
