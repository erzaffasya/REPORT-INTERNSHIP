<?php

namespace App\Http\Controllers;

use App\Models\Akses_program;
use App\Models\Divisi;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($slug)
    {
        $Divisi = Divisi::all();
        $Program = Program::where('slug',$slug)->first();
        $Akses_program = Akses_program::where('program_id', $Program->id)->get();
        $periode = Carbon::parse($Program->periode_mulai)->diffInDays(Carbon::parse($Program->periode_berakhir), false) + 1;
        $user = User::all();
        // dd($Akses_program);
        return view('guest.show', compact('Divisi','Program','periode','Akses_program','user'));
    }
}
