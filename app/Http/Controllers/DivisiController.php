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
        return view('admin.Divisi.index', compact('Divisi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // $kategori = Kategori::all();
        return view('admin.Divisi.tambah');
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
    public function show($id, $program)
    {
        $akses_program = Akses_program::where('program_id', 'id')->get();
        // $program = Program::where('divisi_id', 'id')->first();
        $Akses_divisi = Akses_divisi::where('divisi_id',$id)->get();
        $Divisi = Divisi::where('program_id',$id)->first();
        $Laporan = Laporan::where('divisi_id',$id)->get();
        // dd($Divisi);
        // dd($Laporan->where('isVerif', '!=', 1));
        $Divisiselect = Divisi::where('id', $id)->first();
        return view('admin.Divisi.show', compact('Divisi','Divisiselect','Laporan','Akses_divisi', 'akses_program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Divisi = Divisi::find($id);
        // $kategori = Kategori::all();
        return view('admin.Divisi.edit',compact('Divisi'));
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
        $Divisi = Divisi::findOrFail($id);
        // Storage::delete("public/Divisi/$Divisi->gambar");
        $Divisi->delete();
        return redirect()->route('Divisi.index')
            ->with('delete', 'Divisi Berhasil Dihapus');
    }
}
