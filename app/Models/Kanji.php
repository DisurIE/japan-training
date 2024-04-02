<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    public function radicals()
    {
        return $this->belongsToMany(Radical::class);
    }

    protected $table = 'kanjis';
    protected $fillable = ['character', 'meaning', 'onyomi', 'kunyomi', 'important_reading', 'level'];
}
