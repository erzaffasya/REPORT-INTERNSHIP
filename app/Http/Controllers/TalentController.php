<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;

class TalentController extends Controller
{
    public function index()
    {
        $Talent = Talent::all();
        return view('admin.talent.index', compact('Talent'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.talent.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Talent::create([
            'name' => $request->name
        ]);
        return back();
    }
    public function show($id)
    {
        $Talent = Talent::find($id);
        return view('admin.talent.show', compact('Talent', 'Laporan', 'Akses_talent', 'akses_program', 'Laporanselect'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $Talent = Talent::find($id);
        return view('admin.talent.edit', compact('Talent'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $Talent = Talent::findOrFail($id);
        $Talent->name = $request->name;
        $Talent->save();

        return redirect()->route('Program.index')
            ->with('edit', 'Talent Berhasil Diedit');
    }

    public function destroy($id)
    {
        Talent::where('id', $id)->delete();
        return back()
            ->with('delete', 'Talent Berhasil Dihapus');
    }
}
