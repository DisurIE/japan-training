<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $character
 * @property string|null $meaning
 * @property string|null $reading
 * @property string $image_id
 * @property int $strokes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Collection<int, Kanji> $kanjis
 */

class Radical extends Model
{
    use HasFactory;

    protected $table = 'radicals';

    protected $fillable = [
        'character',
        'meaning',
        'reading',
        'image',
        'kanjis',
        'strokes'
    ];

    public function kanjis() : BelongsToMany
    {
        return $this->belongsToMany(Kanji::class);
    }
}
