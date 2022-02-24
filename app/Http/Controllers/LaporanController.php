<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index($divisi)
    {
        $laporan = Laporan::where('user_id', Auth::user()->id)->where('divisi_id', $divisi)->orderBy('id', 'DESC')->get();
        $divisi = Divisi::find($divisi);
        // dd($divisi);
        return view('magang.laporan.index', compact('laporan', 'divisi'));
    }

    public function create()
    {
        // $kategori = Kategori::all();
        return view('admin.produk.tambah');
    }

    public function show($id)
    {
        // $minggu = Laporan::findorFail($minggu);
        $laporan = Laporan::find($id);
        return view('magang.laporan.view', compact('laporan'));
    }


    public function edit($id)
    {
        $laporan = Laporan::find($id);
        // $kategori = Kategori::all();
        return view('admin.produk.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        
        $Laporan = Laporan::findOrFail($id);
        if ($request->senin != NULL) {
            $Laporan->senin = $request->senin;
        }
        if ($request->selasa != NULL) {
            $Laporan->selasa = $request->selasa;
        }
        if ($request->rabu != NULL) {
            $Laporan->rabu = $request->rabu;
        }
        if ($request->kamis != NULL) {
            $Laporan->kamis = $request->kamis;
        }
        if ($request->jumat != NULL) {
            $Laporan->jumat = $request->jumat;
        }
        if ($request->mingguan != NULL) {
            $Laporan->mingguan = $request->mingguan;
            $Laporan->isVerif = 2;
        }      
        $Laporan->save();
        // dd($id, $request, $Laporan);
        return redirect()->back()
            ->with('edit', 'Laporan Berhasil Dibuat');
    }


    public function veriflaporan(Request $request, $id){
        $Laporan = Laporan::findOrFail($id);
         if ($request->isVerif == 'on') {
            $Laporan->isVerif = 1;
            $Laporan->komentar = NULL;
        }
        //Revisi
        if ($request->komentar != NULL) {
            $Laporan->isVerif = 0;
            $Laporan->komentar = $request->komentar;
        }
        $Laporan->save();
        return redirect()->back()
        ->with('success', 'Berhasil Terkirim');
    }
}
