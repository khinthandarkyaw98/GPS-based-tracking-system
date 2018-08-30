<?php

namespace App\Http\Controllers\Driver\DriverAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class DriverForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function showLinkResetForm() {
        return view('driver.driver-auth.driver-email');
    }

    protected function sendResetLinkEmail(Request $request) {

    }
}
