<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\AdminRegisteredSuccessfully;
use Illuminate\Auth\Events\Registered;
use App\Models\Admin;
use App\Mail\AdminRegistered;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin.login';

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
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function showRegistrationForm() {
        return view('admin.admin-auth.admin-register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'admin_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $admin = Admin::create([
            'admin_name' => $data['admin_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'activation_code' => str_random(30).time(),
        ]);
        //$admin->notify(new AdminRegisteredSuccessfully($admin));
		Mail::to($data['email'])->send(new AdminRegistered($admin));
        return $admin;
    }

    public function register(CreateAdminRequest $request) {
    //public function register(Request $request) {
        $this->validator($request->all())->validate();
        event(new Registered($admin=$this->create($request->all())));
        //$admin=$this->create($request->all());
        return redirect()->route('admin.login')->with(['success'=>'Your account is registered. You will receive an email to activate your account.']);
    }
}

