<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Divisi;
use App\Models\Laporan;
use Carbon\Carbon;
use App\Models\Akses_program;
use App\Models\BeritaAcara;
use App\Models\Talent;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $Divisi = Divisi::all();
        return view('admin.divisi.index', compact('Divisi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.divisi.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'detail' => 'required',
        ]);

        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'detail' => $request->detail,
            'status' => $request->status,
            'program_id' => $request->program_id,
        ]);
        return back();
    }
    public function show($program, $divisi)
    {
        $akses_program = Akses_program::where('program_id', 'id')->get();
        $Akses_divisi = Akses_divisi::where('divisi_id', $divisi)->get();
        // dd($Akses_divisi);
        $beritaAcara = BeritaAcara::where('divisi_id', $divisi)->orderBy('created_at', 'desc')->limit(3)->get();
        $Divisi = Divisi::find($divisi);
        $Laporan = Laporan::where('divisi_id', $divisi)->get();
        $Laporanselect = Laporan::find($divisi);
        return view('admin.divisi.show', compact('Divisi', 'Laporan', 'beritaAcara', 'Akses_divisi', 'akses_program', 'Laporanselect', 'program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Divisi = Divisi::find($id);
        $Talent = Talent::all();
        return view('admin.divisi.edit', compact('Divisi', 'Talent'));
    }

    public function update(Request $request, $id)
    {
        $Divisi = Divisi::findOrFail($id);
        if ($request->criteria == null) {
            $Divisi->nama_divisi = $request->nama_divisi;
            $Divisi->detail = $request->detail;
            $Divisi->status = $request->status;
            $Divisi->program_id = $request->program_id;
        } else {
            $Divisi->criteria = $request->criteria;
        }
        $Divisi->save();

        return redirect()->route('Program.show', $Divisi->program_id)
            ->with('edit', 'Divisi Berhasil Diedit');
    }

    public function destroy($id)
    {
        Divisi::where('id', $id)->delete();
        // Storage::delete("public/Divisi/$Divisi->gambar");
        // $Divisi->delete();
        return back()
            ->with('delete', 'Divisi Berhasil Dihapus');
    }
}
