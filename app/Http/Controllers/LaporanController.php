<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function show($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('admin.produk.show', compact('produk'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $produk = Produk::find($id);
        // $kategori = Kategori::all();
        return view('admin.produk.edit',compact('produk'));
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

        $Produk = Produk::findOrFail($id);

        if ($request->has("gambar1")) {

            Storage::delete("public/Produk/$Produk->gambar");

            $date = date("his");
            $extension = $request->file('gambar1')->extension();
            $file_name = "Produk_$date.$extension";
            $path = $request->file('gambar1')->storeAs('public/Produk', $file_name);
            
            $Produk->gambar = $file_name;
        }

        $Produk->nama = $request->nama;
        $Produk->detail = $request->detail;
        $Produk->harga = $request->harga;
        $Produk->kategori_id = $request->kategori_id;
        $Produk->stok = $request->stok;
        $Produk->save();

        return redirect()->route('produk.index')
        ->with('edit', 'Produk Berhasil Diedit');
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
