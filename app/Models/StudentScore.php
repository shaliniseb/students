<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    use HasFactory;
    public $fillable = [
        'roll_number',
        'english_score',
        'maths_score',
        'physics_score',
        'chemistry_score',
        'biology_score',
    ];
}
