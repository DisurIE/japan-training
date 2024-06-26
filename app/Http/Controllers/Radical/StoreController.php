<?php

namespace App\Http\Controllers\Radical;

use App\Helpers\JsonHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Radical\StoreRequest;
use App\Models\Kanji;
use App\Models\Radical;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        //dd($request->validated());
        $create = Radical::insert($request->validated());

        if($create) {
            return redirect()->route('radicals.index')->with('success', 'Radical created succesfully');
        }
        else{
            return alert(500);
        }
    }
}
