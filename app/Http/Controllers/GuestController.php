<?php

namespace App\Http\Controllers;

use App\Models\Akses_divisi;
use App\Models\Akses_program;
use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($slug)
    {
        $Divisi = Divisi::all();
        $Program = Program::where('slug', $slug)->first();
        $Akses_program = Akses_program::where('program_id', $Program->id)->get();
        $periode = Carbon::parse($Program->periode_mulai)->diffInDays(Carbon::parse($Program->periode_berakhir), false) + 1;
        // dd($Akses_program);
        return view('guest.show', compact('Divisi', 'Program', 'periode', 'Akses_program'));
    }
    public function show($program, $divisi)
    {
        $akses_program = Akses_program::where('program_id', 'id')->get();
        // $program = Program::where('divisi_id', 'id')->first();
        $Akses_divisi = Akses_divisi::where('divisi_id', $divisi)->get();
        $Divisi = Divisi::find($divisi);
        $Laporan = Laporan::where('divisi_id', $divisi)->get();
        $Laporanselect = Laporan::find($divisi);
        return view('guest.divisi', compact('Divisi', 'Laporan', 'Akses_divisi', 'akses_program', 'Laporanselect'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function lihatlaporan()
    {
        $User = User::all();
        $Divisi = Divisi::all();
        $LaporanHarian = null;
        return view('guest.laporan', compact('User', 'Divisi', 'LaporanHarian'));
    }
    public function carilaporan(Request $request)
    {
        // dd($request);
        $User = User::all();
        $Divisi = Divisi::all();
        $LaporanHarian = Laporan::where('user_id', $request->user)->where('divisi_id', $request->divisi)->get();
        // dd($LaporanHarian);
        return view('guest.laporan', compact('User', 'Divisi', 'LaporanHarian'));
    }
    public function detaillaporan($id)
    {
        // $minggu = Laporan::findorFail($minggu);
        $laporan = Laporan::find($id);
        return view('guest.view', compact('laporan'));
    }
}
