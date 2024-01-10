<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaAcara;


class BeritaAcaraController extends Controller
{
    public function index() {

        $berita = BeritaAcara::all();

        return view('admin.berita.index', compact('berita'));
    }
}
