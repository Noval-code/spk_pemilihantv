<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alternative',
        'weight',
        'ranking',
    ];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class, 'id_alternative');
    }
}
