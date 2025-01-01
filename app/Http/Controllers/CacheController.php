<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cache.clear-cache');
    }

    public function clear()
    {
        $user = Auth::user();
        $id = $user->id;
        Logger::log(Logger::ACTION_CLEAR_CACHE, ['user' => $user], null, $id);
        Artisan::call('optimize:clear');
        return __('cache.cache_cleared');
    }
}
