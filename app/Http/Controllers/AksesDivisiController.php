<?php

namespace App\Http\Controllers;
use App\Models\Akses_divisi;
use App\Models\Akses_program;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;

class AksesDivisiController extends Controller
{
    public function create($id)
    {
        // $akses_program = User::where(, $id)->doesnthave('akses_divisi')->get();
        // $akses_program = Akses_program::all();
        $user = User::doesnthave('akses_divisi')->get();
        // $akses_program  = Akses_program::where('program_id', $id)->get();
        $divisi = Divisi::where('id', $id)->first();
        return view('admin.akses_divisi.tambah', compact('divisi', 'user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'divisi_id' =>'required'
        ]);

        // $date = date("his");
        // $extension = $request->file('gambar1')->extension();
        // $file_name = "akses_program_$date.$extension";
        // $path = $request->file('gambar1')->storeAs('public/akses_program', $file_name);

        Akses_divisi::create([
            'user_id' => $request->user_id,
            'divisi_id' => $request->divisi_id
        ]);
        return redirect()->back()
            ->with('success', 'Akses Divisi Berhasil Ditambahkan');
    }

    public function delete($id)
    {
        Akses_divisi::where('id', $id)->delete();
        return redirect()->back()
        ->with('success', 'Data berhasil dihapus');
    }
}
