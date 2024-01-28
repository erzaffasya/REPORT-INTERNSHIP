<?php

namespace App\Http\Controllers;

use App\Models\NilaiUsers;
use App\Models\Divisi;
use App\Models\Program;
use Illuminate\Http\Request;

class NilaiUsersController extends Controller
{
    public function index($id, $divisi)
    {
        $nilai = NilaiUsers::where('user_id', $id)->where('divisi_id', $divisi)->first();
        return view('admin.anggota.penilaian', compact('nilai'));
    }

    public function cetakNilai($id, $divisi, $program)
    {
        $nilai = NilaiUsers::where('user_id', $id)->where('divisi_id', $divisi)->first();
        $divisiUser = Divisi::find($divisi);
        $programUser = Program::find($program);
        return view('admin.anggota.cetaknilai', compact('nilai', 'divisiUser', 'programUser'));
    }

    public function store(Request $request)
    {
        $nilai = NilaiUsers::find($request->id);
        $totalPenilaian = 5;
        for ($i = 1; $i <= 5; $i++) {
            $judulField = "judul_$i";
            $nilaiField = "nilai_$i";
            $nilai->$judulField = $request->$judulField;
            $nilai->$nilaiField = $request->$nilaiField;

            // Cek jika nilaiField tidak kosong dan berbeda dari 0
            if ($nilai->$nilaiField !== null && $nilai->$nilaiField != 0) {
                $totalPenilaian += 1;
            }
        }


        $nilai->nilai_6 = $request->nilai_6;
        $nilai->nilai_7 = $request->nilai_7;
        $nilai->nilai_8 = $request->nilai_8;
        $nilai->nilai_9 = $request->nilai_9;
        $nilai->nilai_10 = $request->nilai_10;
        $nilai->total = $request->nilai_1 + $request->nilai_2 + $request->nilai_3 + $request->nilai_4 + $request->nilai_5 + $request->nilai_6 + $request->nilai_7 + $request->nilai_8 + $request->nilai_9 + $request->nilai_10;
        $nilai->rata_rata = $nilai->total / $totalPenilaian;
        // dd($totalPenilaian);
        $nilai->save();
        return back()->with('success', 'Data berhasil diupdate!');
    }
}
