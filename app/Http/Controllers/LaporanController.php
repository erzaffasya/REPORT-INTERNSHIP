<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::where('user_id', 2)->where('divisi_id', 1)->orderBy('id', 'DESC')->get();
        // dd($laporan[1]->isVerif);
        return view ('index', compact('laporan'));
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
        // $minggu = Laporan::findorFail($minggu);
        $laporan = Laporan::where('id', $id)->where('user_id', 2)->where('divisi_id', 1)->first();
        return view ('view', compact('laporan'));
    }


    public function edit($id)
    {
        $laporan = Laporan::find($id);
        // $kategori = Kategori::all();
        return view('admin.produk.edit',compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        // $laporan = Laporan::findorFail($id);
        // $user = Auth::user();

        // Laporan::where('id',$id)->update([
        //     'senin' => $request->senin,
        //     'selasa' => $request->selasa,
        //     'rabu' => $request->rabu,
        //     'kamis' => $request->kamis,
        //     'jumat' => $request->jumat,
        //     'mingguan' => $request->mingguan,
        //     'komentar' => $request->komentar,
        //     'isVerif' => $request->isVerif
        // ]);
        // if ( $request->isMethod( 'post' ) ) {
        //     $laporan = $request->all();

        $laporan = Laporan::findOrfail($id);
        $laporan->senin = $request->senin;
        $laporan->selasa = $request->selasa;
        $laporan->rabu = $request->rabu;
        $laporan->kamis = $request->kamis;
        $laporan->jumat = $request->jumat;
        $laporan->mingguan = $request->mingguan;
        $laporan->komentar = $request->komentar;
        $laporan->isVerif = 1;
        $laporan->save();
        return redirect()->back()
        ->with('edit', 'Laporan Berhasil Diverifikasi');
        
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
