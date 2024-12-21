<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $text
 * @property string|null $answer
 * @property int $level
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection<int, ExerciseOption> options
 */

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'answer',
        'level'
    ];

    public function options(): HasMany
    {
        return $this->hasMany(ExerciseOption::class, 'exercise_id');
    }
}
