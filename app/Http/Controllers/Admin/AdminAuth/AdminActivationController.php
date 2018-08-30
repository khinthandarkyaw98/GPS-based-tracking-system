<?php

namespace App\Http\Controllers\Admin\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminActivationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

	protected function guard() {
		return auth()->guard('admin');
	}

    public function activateAdmin(Request $request, $code) {
        try {
            $admin = Admin::where('activation_code', $request->activation_code)->first();
            if(!$admin) {
                return redirect()->to('/')->with(['error'=>'Activation code is expired or invalid']);
            }
            $admin->activation_code = null;
            $admin->save();
        }catch(\Exception $exception) {
            logger()->error($exception);
            return "Activation not successful.";
        }
        return redirect()->to('/login')->with(['success'=>'Congratulations! Your account is activated.']);;
    }
}
