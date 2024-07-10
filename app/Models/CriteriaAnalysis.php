<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaAnalysis extends Model
{
    use HasFactory;

    protected $table = 'criterias_analysis';

    protected $fillable = [
        'id_criteria1', 'id_criteria2', 'value'
    ];
}
