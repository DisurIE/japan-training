<?php

namespace App\Http\Controllers;

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

class RadicalController extends Controller
{
    public function index(Radical $radicals)
    {
        return Inertia::render('Radicals', [
            'radicals' => $radicals->all()
        ]);
    }

    public function show(Radical $radical)
    {
        return Inertia::render('RadicalShow', [
            'radical' => $radical
        ]);
    }
}
