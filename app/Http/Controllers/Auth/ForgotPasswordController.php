<?php

namespace App\Http\Controllers\Auth;

use App\Models\Logger;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Override sedRequestLinkEmail to log the action
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request){
        Logger::log(Logger::ACTION_FORGOT_PASSWORD);
        return $this->sendResetLinkResponse($this->broker()->sendResetLink(
            $request->only('email')
        ));
    }
}
