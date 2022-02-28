<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Divisi;
use App\Models\Laporan;
use Carbon\Carbon;
use App\Models\Akses_program;
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
        // $kategori = Kategori::all();
        return view('admin.divisi.tambah');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_divisi' => 'required',
            'detail' => 'required', 
        ]);

        // $date = date("his");
        // $extension = $request->file('gambar1')->extension();
        // $file_name = "Divisi_$date.$extension";
        // $path = $request->file('gambar1')->storeAs('public/Divisi', $file_name);
        // if($request->status == NULL){
        //     $status = false;
        // }else{
        //     $status = true;
        // }
        Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'detail' => $request->detail,
            'status' => $request->status,
            'program_id' => $request->program_id,
        ]);
        return back();
    }
    public function show($program,$divisi)
    {
        $akses_program = Akses_program::where('program_id', 'id')->get();
        // $program = Program::where('divisi_id', 'id')->first();
        $Akses_divisi = Akses_divisi::where('divisi_id',$divisi)->get();
        $Divisi = Divisi::find($divisi);
        $Laporan = Laporan::where('divisi_id',$divisi)->get();
        $Laporanselect = Laporan::find($divisi);
        return view('admin.divisi.show', compact('Divisi','Laporan','Akses_divisi', 'akses_program', 'Laporanselect'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Divisi = Divisi::find($id);
        // $kategori = Kategori::all();
        return view('admin.divisi.edit',compact('Divisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'detail' => 'required',
            // 'gambar1' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            // 'periode_mulai' => 'required',
            // 'periode_berakhir' => 'required',
            // 'status' => 'required',
        ]);

        $Divisi = Divisi::findOrFail($id);

        // if($request->status == NULL){
        //     $status = false;
        // }else{
        //     $status = true;
        // }

        $Divisi->nama_divisi = $request->nama_divisi;
        $Divisi->detail = $request->detail;
        // $Divisi->periode_mulai = $request->periode_mulai;
        $Divisi->status = $request->status;
        $Divisi->program_id = $request->program_id;
        // $Divisi->periode_berakhir = $request->periode_berakhir;
        $Divisi->save();

        return redirect()->route('Program.index')
        ->with('edit', 'Divisi Berhasil Diedit');
    }

    public function destroy($id)
    {
        Divisi::where('id',$id)->delete();
        // Storage::delete("public/Divisi/$Divisi->gambar");
        // $Divisi->delete();
        return back()
            ->with('delete', 'Divisi Berhasil Dihapus');
    }
}
