<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeComp extends Model
{
    use HasFactory;
    protected $table = 'alternative_comp';
    protected $fillable = ['id_criteria', 'id_alternative1', 'value', 'id_alternative2'];
}
