<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	protected function guard() {
		return auth()->guard('admin');
	}

    protected function index() {
	    return view('index');
    }

    protected function myaccount() {

    }

    protected function update(Request $request) {

    }
}
