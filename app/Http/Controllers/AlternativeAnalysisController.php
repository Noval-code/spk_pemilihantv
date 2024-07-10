<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\AlternativeComp;
use App\Models\AlternativeAnalysis;
use App\Models\Criteria;
use DB;

class AlternativeAnalysisController extends Controller
{
    public function index(Request $request)
    {
        // Query untuk mendapatkan nilai id paling awal dari tabel criterias
        $firstCriteriaId = Criteria::orderBy('id')->value('id');

        // Gunakan nilai id yang didapatkan, atau fallback ke 1 jika tabel criterias kosong
        $id_criteria = $request->input('id_criteria', $firstCriteriaId ?? 1);
        $alternatives = Alternative::orderBy('id')->get();
        $comparisons = AlternativeComp::where('id_criteria', $id_criteria)->get();

        $sum_values = [];
        foreach ($alternatives as $alternative) {
            $sum_value = AlternativeComp::where('id_alternative2', $alternative->id)
                ->where('id_criteria', $id_criteria)
                ->sum('value');
            $sum_values[$alternative->id] = $sum_value;
        }

        $normalizations = [];
        foreach ($alternatives as $alt1) {
            $sum_nm = 0.0;
            foreach ($alternatives as $alt2) {
                $value = AlternativeComp::where('id_alternative1', $alt1->id)
                    ->where('id_alternative2', $alt2->id)
                    ->where('id_criteria', $id_criteria)
                    ->first();
                $sub_value = $value ? $value->value : null;
                $total_alt = $sum_values[$alt2->id] ?? 1;
                $normalisasi = $sub_value ? $sub_value / $total_alt : 0;
                $normalizations[$alt1->id][$alt2->id] = $normalisasi;
                $sum_nm += $normalisasi;
            }
            $avg_sum = $sum_nm / ($alternatives->count() ?: 1);
            AlternativeAnalysis::updateOrCreate(
                ['id_alternative' => $alt1->id, 'id_criteria' => $id_criteria],
                ['weight' => $avg_sum]
            );
        }



        return view('alternatives_analysis.index', compact('alternatives', 'comparisons', 'id_criteria', 'normalizations', 'sum_values'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_criteria' => 'required|exists:criterias,id',
            'id_alternative1' => 'required|exists:alternatives,id',
            'value' => 'required|numeric',
            'id_alternative2' => 'required|exists:alternatives,id',
        ]);

        $id_criteria = $validated['id_criteria'];
        $id_alternative1 = $validated['id_alternative1'];
        $value = $validated['value'];
        $id_alternative2 = $validated['id_alternative2'];

        if ($id_alternative1 == $id_alternative2) {
            $newValue = 1;
        } else {
            $newValue = $value;
        }

        $existing_data = AlternativeComp::where('id_alternative1', $id_alternative1)
            ->where('id_alternative2', $id_alternative2)
            ->where('id_criteria', $id_criteria)
            ->first();

        if ($existing_data) {
            $existing_data->update(['value' => $newValue]);
            AlternativeComp::where('id_alternative1', $id_alternative2)
                ->where('id_alternative2', $id_alternative1)
                ->where('id_criteria', $id_criteria)
                ->update(['value' => 1 / $newValue]);
        } else {
            AlternativeComp::create([
                'id_criteria' => $id_criteria,
                'id_alternative1' => $id_alternative1,
                'value' => $newValue,
                'id_alternative2' => $id_alternative2,
            ]);
        }

        return redirect()->route('alternative_analysis.index', ['id_criteria' => $id_criteria])
            ->with('success', 'Data berhasil disimpan');
    }


    public function reset(Request $request)
    {
        $id_criteria = $request->input('id_criteria');
        AlternativeComp::where('id_criteria', $id_criteria)->delete();
        AlternativeAnalysis::where('id_criteria', $id_criteria)->delete();

        return redirect()->route('alternative_analysis.index', ['id_criteria' => $id_criteria]);
    }
}
