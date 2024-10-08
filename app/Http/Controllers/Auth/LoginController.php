<?php

namespace App\Http\Controllers\Auth;

use App\Models\Logger;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function redirectTo(){
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->isSuperAdmin()) {
                return '/super-admin-home';
            }
            if ($user->isAdmin()) {
                return '/admin-home';
            }
        }
        return '/home';
    }

    /**
     * Log the login action after successful authentication
     * 
     * @param \Illumniate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user){
        Logger::log(Logger::ACTION_LOGIN);
        return redirect()->intended($this->redirectTo());
    }

    /**
     * Override the logout method to log the logout action
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request){
        Logger::log(Logger::ACTION_LOGOUT);
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
