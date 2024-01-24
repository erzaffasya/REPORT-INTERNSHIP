<?php

namespace App\Http\Controllers;

use App\Models\NilaiUsers;
use Illuminate\Http\Request;

class NilaiUsersController extends Controller
{
    public function index($id, $divisi)
    {
        $nilai = NilaiUsers::where('user_id', $id)->where('divisi_id', $divisi)->first();
        return view('admin.anggota.penilaian', compact('nilai'));
    }

    public function cetakNilai($id, $divisi)
    {
        $nilai = NilaiUsers::where('user_id', $id)->where('divisi_id', $divisi)->first();
        return view('admin.anggota.cetaknilai', compact('nilai'));
    }

    public function store(Request $request)
    {
        $nilai = NilaiUsers::find($request->id);
        $nilai->judul_1 = $request->judul_1;
        $nilai->nilai_1 = $request->nilai_1;
        $nilai->judul_2 = $request->judul_2;
        $nilai->nilai_2 = $request->nilai_2;
        $nilai->judul_3 = $request->judul_3;
        $nilai->nilai_3 = $request->nilai_3;
        $nilai->judul_4 = $request->judul_4;
        $nilai->nilai_4 = $request->nilai_4;
        if (condition) {
            # code...
        }
        $nilai->judul_5 = $request->judul_5;
        $nilai->nilai_5 = $request->nilai_5;
        $nilai->nilai_6 = $request->nilai_6;
        $nilai->nilai_7 = $request->nilai_7;
        $nilai->nilai_8 = $request->nilai_8;
        $nilai->nilai_9 = $request->nilai_9;
        $nilai->nilai_10 = $request->nilai_10;
        $nilai->total = $request->nilai_1 + $request->nilai_2 + $request->nilai_3 + $request->nilai_4 + $request->nilai_5 + $request->nilai_6 + $request->nilai_7 + $request->nilai_8 + $request->nilai_9 + $request->nilai_10;
        $nilai->rata_rata = $nilai->total/10;
        $nilai->save();
        return back()->with('success', 'Data berhasil diupdate!');
    }
}
