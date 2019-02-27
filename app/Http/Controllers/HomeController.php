<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth; 
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  logout user
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        Auth::logout(); return back();
    }

}
