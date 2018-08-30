<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AdminForgotPasswordController extends Controller
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
	
	protected function guard() {
		return auth()->guard('admin');
	}
	
    protected function showLinkResetForm() {
        return view('admin.admin-auth.admin-email');
    }

    protected function sendResetLinkEmail(Request $request) {

    }
}
