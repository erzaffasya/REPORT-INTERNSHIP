<?php

namespace App\Http\Controllers;
use App\Models\Akses_divisi;
use Illuminate\Http\Request;

class AksesDivisiController extends Controller
{
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
}
