<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Akses_program;
use App\Models\Divisi;
use App\Models\NilaiUsers;
use App\Models\User;
use Illuminate\Http\Request;

class AksesDivisiController extends Controller
{
    public function create($id)
    {
        $user = Akses_program::doesnthave('akses_divisi')->get();
        $divisi = Divisi::where('id', $id)->first();
        return view('admin.akses_divisi.tambah', compact('divisi', 'user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'divisi_id' => 'required'
        ]);
        Akses_divisi::create([
            'user_id' => $request->user_id,
            'divisi_id' => $request->divisi_id
        ]);

        NilaiUsers::create([
            'user_id' => $request->user_id,
            'divisi_id' => $request->divisi_id
        ]);;
        return redirect()->route('Program.show', Divisi::find($request->divisi_id)->program_id)
            ->with('success', 'Akses Divisi Berhasil Ditambahkan');
    }

    public function delete($id)
    {
        $dataAkses_divisi = Akses_divisi::find($id);
        Akses_divisi::where('id', $id)->delete();
        NilaiUsers::where('user_id',$dataAkses_divisi->user_id)->delete();
        return redirect()->back()
            ->with('success', 'Data berhasil dihapus');
    }
}
