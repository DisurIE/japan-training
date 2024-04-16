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

class ShowController extends Controller
{
    public function __invoke(Radical $radical) : Response
    {
        return Inertia::render('Radical/RadicalsShow', [
            'radical' => $radical,
            'kanjis' => Radical::find($radical->id)->kanjis()->orderBy('id')->get(),
        ]);
    }
}
