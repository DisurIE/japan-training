<?php

namespace App\Http\Controllers\Radical;

use App\Models\Radical;
use Inertia\Inertia;
use Inertia\Response;

class EditController extends BaseController
{
    public function __invoke(Radical $radical) : Response
    {
        return Inertia::render('Radical/RadicalsCreateEdit', [
            'radical' => $radical,
        ]);
    }
}
