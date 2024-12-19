<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property Collection<int, \App\Models\Kanji> $kanjis
 */

class Radical extends Model
{
    use HasFactory;

    public function kanjis() : BelongsToMany
    {
        return $this->belongsToMany(Kanji::class);
    }

    protected $table = 'radicals';
    protected $fillable = ['character', 'meaning', 'reading', 'image', 'kanjis', 'strokes'];
}
