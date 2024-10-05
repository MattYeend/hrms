<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function superAdminHome()
    {
        return view('super-admin-home');
    }

    public function adminHome()
    {
        return view('admin-home');
    }
}
