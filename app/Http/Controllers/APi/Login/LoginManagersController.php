<?php

namespace App\Http\Controllers\Api\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class LoginManagersController extends Controller
{
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


    public function Logout()
    {
        Auth::guard('managers')->logout(); return back();
    }
}
