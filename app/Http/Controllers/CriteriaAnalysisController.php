<?php
// app/Http/Controllers/CriteriaAnalysisController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\CriteriaAnalysis;
use DB;

class CriteriaAnalysisController extends Controller
{
    public function index()
    {
        $criterias = Criteria::orderBy('id')->get();
        $criteriaAnalysis = CriteriaAnalysis::all();

        // Perhitungan Jumlah dan Normalisasi
        foreach ($criterias as $criteria) {
            $sum_nilai = $criteriaAnalysis->where('id_criteria2', $criteria->id)->sum('value');
            $criteria->total_criterias = round($sum_nilai, 2);
            $criteria->save();
        }

        $normalizations = [];
        foreach ($criterias as $criteria) {
            $sum_nm = 0.0;
            foreach ($criterias as $innerCriteria) {
                $value = $criteriaAnalysis->where('id_criteria1', $criteria->id)->where('id_criteria2', $innerCriteria->id)->first();
                $sub_value = $value ? $value->value : null;
                if ($sub_value !== null && $innerCriteria->total_criterias != 0) {
                    $normalisasi = $sub_value / $innerCriteria->total_criterias;
                    $sum_nm += $normalisasi;
                    $normalizations[$criteria->id][$innerCriteria->id] = round($normalisasi, 2);
                } else {
                    $normalizations[$criteria->id][$innerCriteria->id] = '';
                }
            }
            $avg_sum = $sum_nm / $criterias->count(); // Avoid division by zero
            $criteria->total_normalization = $sum_nm;
            $criteria->weight = round($avg_sum, 2);
            $criteria->save();
        }

        // Perhitungan Matriks
        foreach ($criterias as $criteria) {
            $sum_matriks = 0.0;
            $query1 = CriteriaAnalysis::where('id_criteria1', $criteria->id)->get();
            foreach ($query1 as $b) {
                $nilai_sub = $b->value;
                $bobot_k = Criteria::find($b->id_criteria2)->weight;
                if ($bobot_k != 0) {
                    $matriks = $nilai_sub * $bobot_k;
                    $sum_matriks += $matriks;
                }
            }
            $criteria->matrix = $sum_matriks;
            $criteria->save();
        }

        // Cek Konsistensi
        $eigen_max = 0;
        $criteriaLength = $criterias->count();
        foreach ($criterias as $criteria) {
            $bobot_kriteria = $criteria->weight;
            $matriks_kriteria = $criteria->matrix;
            if ($bobot_kriteria != 0) {
                $eigen = $matriks_kriteria / $bobot_kriteria;
                $eigen_max += $eigen;
            }
        }

        if ($criteriaLength > 1) {
            $avg_eigen_max = $eigen_max / $criteriaLength;
            $ci = ($avg_eigen_max - $criteriaLength) / ($criteriaLength - 1);
            $ri_values = [
                1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90, 5 => 1.12,
                6 => 1.24, 7 => 1.32, 8 => 1.41, 9 => 1.45, 10 => 1.49
            ];
            $ri = $ri_values[$criteriaLength] ?? 0.00;
            if ($ri != 0) {
                $cr = $ci / $ri;
                $consistency_message = $cr < 0.1 ? "perhitungan konsisten." : "perhitungan tidak konsisten.";
            } else {
                $consistency_message = "Nilai RI tidak valid untuk jumlah kriteria ini.";
                $cr = null;
            }
        } else {
            $consistency_message = "Tidak ada kriteria yang valid untuk perhitungan konsistensi.";
            $ci = $cr = $avg_eigen_max = $ri = null;
        }

        return view('criteria_analysis.index', compact('criterias', 'criteriaAnalysis', 'normalizations', 'ci', 'cr', 'avg_eigen_max', 'criteriaLength', 'ri', 'consistency_message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_criteria1' => 'required|exists:criterias,id',
            'value' => 'required|numeric',
            'id_criteria2' => 'required|exists:criterias,id',
        ]);

        $id_criteria1 = $request->id_criteria1;
        $value = $request->value;
        $id_criteria2 = $request->id_criteria2;

        $div_value = CriteriaAnalysis::where('id_criteria1', $id_criteria2)
            ->where('id_criteria2', $id_criteria1)
            ->first();

        if (empty($div_value)) {
            if ($id_criteria1 == $id_criteria2) {
                $newValue = 1;
            } else {
                $newValue = $value;
            }
        } else {
            $newValue = 1 / $div_value->value;
        }

        $existing_data = CriteriaAnalysis::where('id_criteria1', $id_criteria1)
            ->where('id_criteria2', $id_criteria2)
            ->first();

        if ($existing_data) {
            $existing_data->update(['value' => $newValue]);
            CriteriaAnalysis::where('id_criteria1', $id_criteria2)
                ->where('id_criteria2', $id_criteria1)
                ->update(['value' => $value]);
        } else {
            CriteriaAnalysis::create([
                'id_criteria1' => $id_criteria1,
                'value' => $newValue,
                'id_criteria2' => $id_criteria2,
            ]);
        }

        return redirect()->route('criteria_analysis.index')->with('success', 'Data berhasil disimpan');
    }

    public function reset()
    {
        CriteriaAnalysis::truncate();
        return redirect()->route('criteria_analysis.index');
    }
}
