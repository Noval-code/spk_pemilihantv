<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeAnalysis extends Model
{
    use HasFactory;
    protected $table = 'alternative_analysis';
    protected $fillable = ['id_criteria', 'id_alternative', 'weight'];
}
