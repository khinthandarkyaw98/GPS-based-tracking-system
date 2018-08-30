<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    //protected $redirectTo = '/admin/home';
    protected $redirectTo = '/menu';

    public function __construct()
    {
        $this->middleware('guest', ['except'=>['logout']]);
    }

	public function guard() {
		//return Auth::guard('admin');
		return auth()->guard('admin');
	}

    public function showLoginForm() {
        return view('admin.admin-auth.admin-login');
    }

    //from original logincontroller
    protected function credentials(CreateAdminRequest $request) {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'activation_code' => null,
        ];
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' =>'required|email',
            'password' => 'required|min:6',
            //'activation_code' => null,
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password, 'activation_code'=>null], $request->remember)) {
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout() {
         Auth::guard('admin')->logout();
         return redirect()->to('/');
    }
}
