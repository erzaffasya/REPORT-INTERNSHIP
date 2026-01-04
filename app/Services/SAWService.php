<?php

namespace App\Services;

use Illuminate\Support\Collection;

/**
 * SAW (Simple Additive Weighting) Service
 * 
 * Metode pengambilan keputusan multi-kriteria untuk 
 * merekomendasikan divisi berdasarkan talent user.
 */
class SAWService
{
    private const MAX_SCORE = 10; // Nilai maksimal talent

    /**
     * Hitung rekomendasi divisi untuk user menggunakan metode SAW
     */
    public function recommend($student, Collection $divisions): Collection
    {
        $recommendations = collect();

        foreach ($divisions as $divisi) {
            $criteria = json_decode($divisi->criteria, true) ?? [];
            
            if (empty($criteria)) {
                continue;
            }

            $threshold = $criteria['threshold'] ?? 0;
            unset($criteria['threshold']);
            
            if (empty($criteria)) {
                continue;
            }

            $score = $this->calculateSAW($student->talents, $criteria);
            
            if ($score >= $threshold) {
                $recommendations->push([
                    'divisi' => $divisi,
                    'score' => $score,
                    'score_percentage' => round($score * 100, 2),
                ]);
            }
        }

        return $recommendations->sortByDesc('score')->values();
    }

    /**
     * Hitung skor preferensi SAW
     * Rumus: V = Σ(w_normalized × r_normalized)
     */
    private function calculateSAW(Collection $talents, array $weights): float
    {
        $totalWeight = array_sum($weights);
        
        if ($totalWeight === 0) {
            return 0;
        }

        $preferenceScore = 0;

        foreach ($weights as $criteriaName => $weight) {
            $talent = $talents->firstWhere('name', $criteriaName);
            $rawValue = $talent ? (int) $talent->pivot->score : 0;
            
            // Normalisasi: nilai/max * bobot/total_bobot
            $normalizedValue = $rawValue / self::MAX_SCORE;
            $normalizedWeight = $weight / $totalWeight;
            
            $preferenceScore += $normalizedValue * $normalizedWeight;
        }

        return round($preferenceScore, 4);
    }
}
