<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $Program = Program::get()->count();
        $Divisi = Divisi::get()->count();
        $Laporan = Laporan::get()->count();
        $User = User::where('role','magang')->get()->count();
        return view('admin.index', compact('Program','Divisi','Laporan','User'));
    }
}
