<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Logger;

class LocaleController extends Controller
{
    public function __construct()
    {
        // Add Middleware to protect routes
        // E.G $this->middleware('auth');
    }
    
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $locale = $request->input('locale');
        if(in_array($locale, ['en','pt', 'es', 'cy'])){
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        return redirect()->back();
    }
}
