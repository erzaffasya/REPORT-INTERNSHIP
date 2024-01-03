<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function recommend($id)
    {
        $student = User::where('id',$id)->with('talents')->first();
        $dataDivisi = Divisi::all();
        $recommendedDepartments = collect();
        // dd($student->talents);
        foreach ($dataDivisi as $divisi) {
            $criteria = json_decode($divisi->criteria, true);
            if (!isset($criteria['threshold'])) {
                // Handle error atau berikan default value
                $criteria['threshold'] = 7; // Misalnya, default threshold
            }

            // Hitung skor kesesuaian berdasarkan kriteria
            $matchScore = $this->calculateMatchScore($student->talents, $criteria);
            if ($matchScore >= $criteria['threshold']) {
                $recommendedDepartments->push([
                    'divisi' => $divisi,
                    'score' => $matchScore
                ]);
                
            }
        }
        // dd($student);

        return view('admin.program.recommendation', compact('student', 'recommendedDepartments'));
    }

    private function calculateMatchScore($talents, $criteria)
    {
        $score = 0;
        foreach ($talents as $talent) {
            if (array_key_exists($talent->name, $criteria)) {
                $score += $talent->pivot->score * $criteria[$talent->name];
            }
        }
        return $score;
    }
}
