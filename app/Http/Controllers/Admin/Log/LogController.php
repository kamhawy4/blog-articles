<?php

namespace App\Http\Controllers\Admin\Log;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use DataTables;

class LogController extends Controller
{

    public function __construct()
    {
      $this->middleware('permission:log-list|log-delete', ['only' => ['index','store']]);
      $this->middleware('permission:log-delete', ['only' => ['destroy']]);
    }

    public function GetAllLog(Request $request)
    {
      if ($request->ajax()) {
    	     $logs = \LogActivity::logActivityLists();
            return Datatables::of($logs)
                     ->editColumn('check', function($log){
                         $check = '<td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input  type="checkbox"  name="check[]  class="checkboxes" value="'.$log->id.'" /><span></span></label></td>';
                         return $check;
                    })->editColumn('url', function($log)
                      {
                          $url = '<td> <span class="text-success" >' .$log->url.'<span/></td>';
                          return $url;
                      })
                     ->editColumn('method', function($log)
                      {
                          $method = '<td ><span class="label label-info">'.$log->method.'<span/> </td>';
                          return $method;
                      })
                     ->editColumn('ip', function($log)
                      {
                          $ip = '<td><span class="text-warning">'.$log->ip.'<span/> </td>';
                          return $ip;
                      })
                     ->editColumn('agent', function($log)
                      {
                          $agent = '<td><span class="text-danger">'.$log->agent.'<span/> </td>';
                          return $agent;
                      })
                     ->editColumn('user_id', function($log)
                      {
                          $user_id = '<td>'.$log->GetNameUser->name.'</td>';
                          return $user_id;
                      })
                     ->editColumn('created_at', function($log)
                      {
                          $created_at = '<td>'. timezone()->convertToLocal($log->created_at)  .':'.  $log->created_at->diffForHumans() .'</td>';
                          return $created_at;
                      })
                    ->rawColumns(['check','url','method','ip','agent','user_id','created_at'])
                    ->make(true);
        }
      
    	return view('admin.log.index');
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
