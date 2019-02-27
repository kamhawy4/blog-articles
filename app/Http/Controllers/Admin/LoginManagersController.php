<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginManagersController extends Controller
{
    // return page login Manager
    public function index()
    {
    	return view('admin.loginManagers.login');
    }

    // Function login Manager
    public function LoginManagers()
    {
    	$email    = request('email');
    	$password = request('password');
    	if (Auth::guard('managers')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }else {
          return back();
        }
    }
}
