<?php

namespace App\Http\Controllers\Admin\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;

class LogController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:log-list|log-delete', ['only' => ['index','store']]);
      $this->middleware('permission:log-delete', ['only' => ['destroy']]);
    }

    public function GetAllLog()
    {
    	$logs = \LogActivity::logActivityLists();
    	return view('admin.log.index',compact('logs'));
    }

    public function DeleteLog(Request $request)
    {
      if(!empty($request->check)) {
    		LogActivity::destroy($request->check);
    		session()->flash('success','Data deleted successfully');
  		  return back();
  	  }else{
  	  	session()->flash('warning','Please select a item at least');
  	  	return back();
  	  }	
    }

}
