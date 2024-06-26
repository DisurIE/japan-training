<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kanji extends Model
{
    use HasFactory;

    public function radicals() : belongsToMany
    {
        return $this->belongsToMany(Radical::class);
    }

    protected $table = 'kanjis';
    protected $fillable = ['character', 'meaning', 'onyomi', 'kunyomi', 'important_reading', 'level'];
}
