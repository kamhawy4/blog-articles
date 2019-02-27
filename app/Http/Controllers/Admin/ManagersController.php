<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\Mangaers;
use Auth;


class ManagersController extends Controller
{	

    // Return view page index Mangaers And Return All Mangaers without Manager Auth
    public function index()
    {
    	$mangaers =  Mangaers::where('id','!=',Auth::guard('managers')->user()->id)->get(); 
    	return view('admin.managers.index',compact('mangaers'));
    }

	// Return view page create Managers 
    public function create()
    {
    	return view('admin.managers.create');
    }
   
	// Return view page Edit Mangaer And Return Mangaer by id
    public function edit($id)
    {
	    $update =  Mangaers::findOrFail($id);
    	return view('admin.managers.edit',compact('update'));
    }

	// Store Mangaer 
	public function store(StoreUsersRequest $request)
	{
	    $this->validate($request,[ 

	    ]);
        
        // Merge password and Mangaers Create   
    	$request   ->  merge(['password' => bcrypt($request->password)]); 
	    Mangaers::create($request->all());

	    session()->flash('save','The manager has been successfully added');
	    return redirect()->to(url('dashboard/managers'));
	}

	// update Mangaers 
	public function update($id,UpdateUsersRequest $request)
	{	
		// get Mangaer by id
		$update    =  Mangaers::findOrFail($id);

		// check password empty and merge it 
	    if($request->has('password')){
    	$request   ->  merge(['password' => bcrypt($request->password)]);
	    }else{
    	$request   ->  merge(['password' => $update->password]);}

		$update    -> update($request->all());
		session()->flash('success','Data modified successfully');
		return redirect()->to(url('dashboard/managers'));
	}

    // destroy managers by id
 	public function destroy($id)
	{
		if($id != Auth::guard('managers')->user()->id)
	  	{
		 $delete  =  Mangaers::findOrFail($id);
		 $delete  -> delete();
		 session()->flash('success','The manager was successfully deleted');
		 return redirect()->to(url('dashboard/managers'));	
	    }else
	    {
         return back();
	    }
	}

    // destroy Multi Mangaers by id
	public function DeleteMangaers(Request $request)
	{
	  if($request->check != '')
	  {
		Mangaers::destroy($request->check); 
		session()->flash('success','Data deleted successfully');
		return back();
	  	session()->flash('warning','Please select a manager at least');
	  	return back();
	  }	
	}
}
