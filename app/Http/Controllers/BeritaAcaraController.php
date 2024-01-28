<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaAcara;
use App\Models\Divisi;

class BeritaAcaraController extends Controller
{
    public function index($divisi)
    {
        $dataDivisi = Divisi::find($divisi);
        $berita = BeritaAcara::where('divisi_id', $divisi)->get();

        return view('admin.berita.index', compact('berita', 'divisi','dataDivisi'));
    }

    public function store(Request $request)
    {
        BeritaAcara::create($request->all());
        return back()->with('success', 'Data Berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $berita = BeritaAcara::find($id);
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->save();
        return back()->with('success', 'Data Berhasil diubah');
    }

    public function destroy($id)
    {
        $berita = BeritaAcara::find($id);
        $berita->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
