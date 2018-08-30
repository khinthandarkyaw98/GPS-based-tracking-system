<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AdminResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
		//return Auth::guard('admin');
		return auth()->guard('admin');

	}

    protected function showResetForm() {

    }

    protected function reset(Request $request) {

    }
}
