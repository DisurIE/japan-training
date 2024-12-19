<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'exercise_id',
        'option_text'
    ];

    public function exercise(){
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }
}
