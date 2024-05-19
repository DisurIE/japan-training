<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class ProfileSentecesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return Inertia::render('DashboardSentences', [
            'levels' => Level::all()
        ]);
    }
    public function show($name)
    {
        return Inertia::render('DashboardSentencesShow', [
            'name' => $name
        ]);
    }
}
