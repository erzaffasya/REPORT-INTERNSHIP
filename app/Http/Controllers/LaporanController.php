<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::where('user_id', 2)->get();
        return view ('view', compact('laporan'));
    }

    public function create()
    {
        // $kategori = Kategori::all();
        return view('admin.produk.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'detail' => 'required',
            'stok' => 'required',
            'gambar1' => 'required', 
        ]);

        $date = date("his");
        $extension = $request->file('gambar1')->extension();
        $file_name = "Produk_$date.$extension";
        $path = $request->file('gambar1')->storeAs('public/Produk', $file_name);

        Produk::create([
            'nama' => $request->nama,
            'detail' => $request->detail,
            'gambar' => $file_name,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return redirect()->route('produk.index')
            ->with('success', 'Produk Berhasil Ditambahkan');
    }
    public function show()
    {
        $laporan = Laporan::where('user_id', 2)->where('divisi_id', 1)->first();
        return view ('view', compact('laporan'));
    }


    public function edit($id)
    {
        $produk = Produk::find($id);
        // $kategori = Kategori::all();
        return view('admin.produk.edit',compact('produk'));
    }

    public function update(Request $request)
    {
        // $laporan = Laporan::findorFail($id);
        $user = Auth::user();

        Laporan::where('user_id', 2)->where('divisi_id', 1)->update([
            'senin' => $request->senin,
            'selasa' => $request->selasa,
            'rabu' => $request->rabu,
            'kamis' => $request->kamis,
            'jumat' => $request->jumat
        ]);

        return redirect()->route('indexLaporan')
        ->with('edit', 'Laporan Berhasil Dibuat');
    }

    public function destroy($id)
    {
        $Produk = Produk::findOrFail($id);
        Storage::delete("public/Produk/$Produk->gambar");
        $Produk->delete();
        return redirect()->route('produk.index')
            ->with('delete', 'Produk Berhasil Dihapus');
    }

    public function grid()
    {
        $produk = Produk::all();
        // $kategori = Kategori::all();
        return view('admin.produk.grid', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
