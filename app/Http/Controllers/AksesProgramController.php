<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Akses_program;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AksesProgramController extends Controller
{
    public function index($id)
    {
        $akses_program = Akses_program::where('user_id', 'id')->get();
        $program = Program::where('program_id', $id)->first();
        return view('admin.akses_program.index', compact('akses_program', 'program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create($id)
    {
        // $kategori = Kategori::all();
        $user = User::doesnthave('akses_program')->get();
        $program = Program::find($id);
        // dd($user);
        return view('admin.akses_program.tambah', compact('user', 'program'));
    }

    public function store(Request $request)
    {
        // dd($request);
        Akses_program::create([
            'program_id' => $request->program_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->back()
            ->with('success', 'Akses Program Berhasil Ditambahkan!');
        // return response()->json(['success'=>"Data berhasil ditambahkan.", 'tr'=>'tr_'.$id]);
    }
    public function tambahSemuaAksesProgram(Request $request)
    {
        $ids = $request->ids;
        Akses_program::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"data berhasil ditambahkan."]);
    }
    public function show($id)
    {
        $akses_program = Akses_program::where('id', $id)->first();
        return view('admin.akses_program.show', compact('akses_program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $akses_program = Akses_program::find($id);
        // $kategori = Kategori::all();
        return view('admin.akses_program.edit',compact('akses_program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'detail' => 'required',
            'gambar1' => 'file|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048',
            'harga' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
        ]);

        $akses_program = Akses_program::findOrFail($id);

        if ($request->has("gambar1")) {

            Storage::delete("public/akses_program/$akses_program->gambar");

            $date = date("his");
            $extension = $request->file('gambar1')->extension();
            $file_name = "akses_program_$date.$extension";
            $path = $request->file('gambar1')->storeAs('public/akses_program', $file_name);
            
            $akses_program->gambar = $file_name;
        }

        $akses_program->nama = $request->nama;
        $akses_program->detail = $request->detail;
        $akses_program->harga = $request->harga;
        $akses_program->kategori_id = $request->kategori_id;
        $akses_program->stok = $request->stok;
        $akses_program->save();

        return redirect()->route('akses_program.index')
        ->with('edit', 'akses_program Berhasil Diedit');
    }

    public function delete($id)
    {
        Akses_program::where('id', $id)->delete();
        return redirect()->back()
        ->with('success', 'Data berhasil dihapus');
    }


    public function grid()
    {
        $akses_program = Akses_program::all();
        // $kategori = Kategori::all();
        return view('admin.akses_program.grid', compact('akses_program'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
