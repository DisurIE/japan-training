<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $character
 * @property string|null $meaning
 * @property string|null $onyomi
 * @property string $kunyomi
 * @property string $important_reading
 * @property int $level
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Radical> $radicals
 */

class Kanji extends Model
{
    use HasFactory;

    protected $table = 'kanjis';

    protected $fillable = [
        'character',
        'meaning',
        'onyomi',
        'kunyomi',
        'important_reading',
        'level'
    ];
    public function radicals() : belongsToMany
    {
        return $this->belongsToMany(Radical::class);
    }
}
