<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Friends;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::where('id','!=',Auth::user()->id)->get(); 
        return view('home',compact('users'));
    }

    public function logout()
    {
        Auth::logout(); return back();
    }

}
