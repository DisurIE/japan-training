<?php

namespace App\Models\Enums;

use App\Traits\EnumWithValues;

enum ExerciseLevels: string
{
    use EnumWithValues;

    case N1 = 'N1';
    case N2 = 'N2';
    case N3 = 'N3';
    case N4 = 'N4';
    case N5 = 'N5';
}
