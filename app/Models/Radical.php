<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Radical extends Model
{
    use HasFactory;

    public function kanjis() : BelongsToMany
    {
        return $this->belongsToMany(Kanji::class);
    }

    protected $table = 'radicals';
    protected $fillable = ['character'];
}
