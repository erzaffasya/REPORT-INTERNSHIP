<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Akses_program;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $Program = Program::all();
        return view('admin.Program.index', compact('Program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // $kategori = Kategori::all();
        return view('admin.Program.tambah');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'judul' => 'required',
            'detail' => 'required',
            'periode_mulai' => 'required',
            'periode_berakhir' => 'required',
            'status' => 'required', 
        ]);

        // $date = date("his");
        // $extension = $request->file('gambar1')->extension();
        // $file_name = "Program_$date.$extension";
        // $path = $request->file('gambar1')->storeAs('public/Program', $file_name);
        if($request->status == NULL){
            $status = false;
        }else{
            $status = true;
        }
        Program::create([
            'judul' => $request->judul,
            'detail' => $request->detail,
            // 'gambar' => $file_name,
            'periode_mulai' => Carbon::parse($request->periode_mulai),
            'periode_berakhir' => Carbon::parse($request->periode_berakhir),
            'status' => $status,
        ]);
        return redirect()->route('Program.index')
            ->with('success', 'Program Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $Akses_program = Akses_program::where('program_id',$id)->get();
        $Divisi = Divisi::where('program_id',$id)->get();
        // dd($Divisi);
        // dd($Akses_program);
       
        $Program = Program::where('id', $id)->first();
        $periode = Carbon::parse($Program->periode_mulai)->diffInDays(Carbon::parse($Program->periode_berakhir),false) + 1;
        // $program = Program::all();
        // $data = NULL;
        // foreach ($program as $item) {
        //     // $formatted_dt1 = Carbon::parse($item->periode_mulai);
        //     // $formatted_dt2 = Carbon::parse($item->periode_berakhir);
        //     // $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
        //     $date_diff = Carbon::parse($item->periode_mulai)->diffInDays(Carbon::parse($item->periode_berakhir),false) + 1;
        //     // dd($date_diff);
        //     // echo $date_diff;
        //     if ($date_diff >= "6") {
        //         //butuh id
        //         // $asd = Divisi::where('program_id',$item->id)->get();
        //         // dd($asd);
        //         $divisi = Divisi::select('akses_divisi.user_id','akses_divisi.divisi_id','divisi.program_id')->join('akses_divisi','akses_divisi.divisi_id','divisi.id')->where('divisi.program_id',$item->id)->get();
        //     //    dd($divisi);
        //         foreach($divisi as $divisis){
        //             Laporan::create([
        //                 'isVerif' => False,
        //                 'user_id' => $divisis->user_id,
        //                 'divisi_id' => $divisis->divisi_id,
        //             ]);
        //             // echo $divisis->user_id;
        //         }
        //     }
        // }
        // echo $data;
        // dd($divisis->divisi_id);
        return view('admin.Program.show', compact('Program','Akses_program','Divisi','periode'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Program = Program::find($id);
        // $kategori = Kategori::all();
        return view('admin.Program.edit',compact('Program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'detail' => 'required',
            // 'gambar1' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            'periode_mulai' => 'required',
            'periode_berakhir' => 'required',
            // 'status' => 'required',
        ]);

        $Program = Program::findOrFail($id);

        if($request->status == NULL){
            $status = false;
        }else{
            $status = true;
        }

        $Program->judul = $request->judul;
        $Program->detail = $request->detail;
        $Program->periode_mulai = $request->periode_mulai;
        $Program->status = $status;
        $Program->periode_berakhir = $request->periode_berakhir;
        $Program->save();

        return redirect()->route('Program.index')
        ->with('edit', 'Program Berhasil Diedit');
    }

    public function destroy($id)
    {
        $Program = Program::findOrFail($id);
        // Storage::delete("public/Program/$Program->gambar");
        $Program->delete();
        return redirect()->route('Program.index')
            ->with('delete', 'Program Berhasil Dihapus');
    }

    public function tambahjadwal()
    {
            Program::create([
                'judul' => '1',
                'detail' => '1',
            ]);
            return True;
    }
}
