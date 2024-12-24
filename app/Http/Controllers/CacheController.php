<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logger;

class CacheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showClearCachePage()
    {
        return view('cache.clear-cache');
    }
}
