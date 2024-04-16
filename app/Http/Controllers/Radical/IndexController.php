<?php

namespace App\Http\Controllers\Radical;

use App\Helpers\JsonHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Kanji;
use App\Models\Radical;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    public function __invoke(Radical $radicals) : Response
    {
        //JsonHandler::addRadicalsToDatabaseFromJson("radicals.json");
        return Inertia::render('Radicals', [
            'radicals' => $radicals->all()
        ]);
    }
}
