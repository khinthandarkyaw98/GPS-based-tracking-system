<?php

namespace App\Http\Controllers\Driver\DriverAuth;

use App\Http\Requests\CreateDriverRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/drivers/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard() {
        return auth()->guard('driver');
    }

    protected function showLoginForm() {
        return view('driver.driver-auth.driver-login');
    }

    protected function credentials(CreateDriverRequest $request) {
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

            if(Auth::guard('driver')->attempt(['email'=>$request->email,'password'=>$request->password, 'activatiion_code'=>null], $request->remember)) {
                return redirect()->intended(route('driver.home'));
            }
            return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout() {
            Auth::guard('driver')->logout();
            return redirect()->to('/');
    }
}
