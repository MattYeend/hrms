<?php

namespace App\Http\Controllers\Auth;

use App\Models\Logger;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Override resetPassword to log the action
     * 
     * @param \App\Models\User $user
     * @param string $password
     * @return void
     */
    protected function resetPassword($user, $password){
        Logger::log(Logger::ACTION_RESET_PASSWORD);

        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        $this->guard()->login($user);
    }
}
