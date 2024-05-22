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

class UpdateController extends BaseController
{
    public function __invoke(StoreRequest $request, $radical)
    {
        //dd($request->validated());
        $radical2 = Radical::where('id', $radical)->first();
        //dd($radical2);
        $update = $radical2->update($request->validated());
        dd($update);
        if($update) {
            return redirect()->route('radicals.index')->with('success', 'Radical created succesfully');
        }
        else{
            return alert(500);
        }
    }
}
