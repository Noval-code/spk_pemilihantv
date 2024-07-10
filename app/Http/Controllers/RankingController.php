<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\AlternativeAnalysis;
use App\Models\Criteria;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        // Ambil semua kriteria
        $criterias = Criteria::all();
        $alternatives = Alternative::orderBy('id')->get();
        $final_weights = [];

        foreach ($alternatives as $alternative) {
            $total_weight = 0;

            foreach ($criterias as $criteria) {
                $analysis = AlternativeAnalysis::where('id_criteria', $criteria->id)
                    ->where('id_alternative', $alternative->id)
                    ->first();

                if ($analysis) {
                    $weighted_score = $analysis->weight * $criteria->weight;
                    $total_weight += $weighted_score;
                }
            }

            $final_weights[$alternative->id] = round($total_weight, 6); // Pembulatan untuk hasil akhir
        }

        // Hitung peringkat berdasarkan bobot total
        arsort($final_weights);
        $rankings = array_keys($final_weights);
        $rank = 1;

        foreach ($rankings as $id_alternative) {
            Ranking::updateOrCreate(
                ['id_alternative' => $id_alternative],
                ['weight' => $final_weights[$id_alternative], 'ranking' => $rank++]
            );
        }

        $rankings = Ranking::with(['alternative'])->orderBy('ranking')->get();

        return view('rankings.index', compact('rankings'));
    }
}
