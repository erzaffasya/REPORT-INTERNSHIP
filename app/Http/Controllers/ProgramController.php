<?php

namespace App\Http\Controllers;

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
        $Program = Program::where('id', $id)->first();
        return view('admin.Program.show', compact('Program'))
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
            'kategori_id' => 'required',
            'periode_berakhir' => 'required',
            'status' => 'required',
        ]);

        $Program = Program::findOrFail($id);

        // if ($request->has("gambar1")) {

        //     Storage::delete("public/Program/$Program->gambar");

        //     $date = date("his");
        //     $extension = $request->file('gambar1')->extension();
        //     $file_name = "Program_$date.$extension";
        //     $path = $request->file('gambar1')->storeAs('public/Program', $file_name);
            
        //     $Program->gambar = $file_name;
        // }

        $Program->judul = $request->judul;
        $Program->detail = $request->detail;
        $Program->periode_mulai = $request->periode_mulai;
        $Program->kategori_id = $request->kategori_id;
        $Program->status = $request->status;
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
}
