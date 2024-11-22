<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $locale = $request->input('locale');
        if(in_array($locale, ['en','de','fr','pt','es','cy'])){
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        Logger::log(Logger::ACTION_LANGUAGE_CHANGE_SWITCH, ['language_change' => $locale]);
        return redirect()->back();
    }
}
