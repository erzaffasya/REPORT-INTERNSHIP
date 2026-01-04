<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use App\Services\SAWService;

class RecommendationController extends Controller
{
    protected $sawService;

    public function __construct(SAWService $sawService)
    {
        $this->sawService = $sawService;
    }

    /**
     * Menampilkan rekomendasi divisi untuk user menggunakan metode SAW
     */
    public function recommend($id, $program)
    {
        $student = User::where('id', $id)->with('talents')->first();
        $dataDivisi = Divisi::where('program_id', $program)->get();
        
        // Hitung rekomendasi menggunakan SAW
        $recommendedDepartments = $this->sawService->recommend($student, $dataDivisi);

        return view('admin.program.recommendation', compact('student', 'recommendedDepartments'));
    }
}
