<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth; 
use DB;
use App\Events\EventTest;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function testEvent(){
		try {	
			Log::info('=== Hello  ========');
			event(new EventTest());
		    return 'hello';
		  } catch(Exception $ex) {
			 Log::info('Error'. $e->getMessage());
			 return $ex;
		  }
    }

}
