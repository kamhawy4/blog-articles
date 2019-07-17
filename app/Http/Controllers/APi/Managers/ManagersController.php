<?php

namespace App\Http\Controllers\Api\Managers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\Mangaers;
use App\Repositories\Managers\ManagersRepositories;
use Auth;

class ManagersController extends Controller
{
	protected $modelArticles;

    function __construct(Mangaers $mangaers)
    {
       $this->modelManagers       = new ManagersRepositories($mangaers);
    }

    // Return view page index Mangaers And Return All Mangaers without Manager Auth
    public function index()
    {
    	$mangaers =  $this->modelManagers->all();
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
		$update    =  $this->modelManagers->show($id);			    
    	return view('admin.managers.edit',compact('update'));
    }

	// Store Mangaer 
	public function store(StoreUsersRequest $request)
	{ 
        // Merge password and Mangaers Create   
    	$request   ->  merge(['password' => bcrypt($request->password)]);	    
        $this->modelManagers->store($request);
	    session()->flash('save','The manager has been successfully added');
	    return redirect()->to(url('dashboard/managers'));
	}


	// update Mangaers
	public function update($id,UpdateUsersRequest $request)
	{	
		$update    =  $this->modelManagers->show($id);			    

		// check password empty and merge it
       if($request->password != null ){
    	$request   ->  merge(['password' => bcrypt($request->password)]);
	     }else{
    	$request   ->  merge(['password' => $update->password]);}

		$this->modelManagers->update($request,$id);

		session()->flash('success','Data modified successfully');
		return redirect()->to(url('dashboard/managers'));
	}

    // destroy managers by id
 	public function destroy($id)
	{
		if($id != Auth::guard('managers')->user()->id)
	  	{
		 $this->modelManagers->delete($id);
		 session()->flash('success','The manager was successfully deleted');
		 return redirect()->to(url('dashboard/managers'));	
	    }else{
         return back();
	    }
	}

    // destroy Multi Mangaers by id
	public function DeleteMangaers(Request $request)
	{
	  if(!empty($request->check))
      {
		$this->modelManagers->deleteMangaersCheck($request->check);
		session()->flash('success','Data deleted successfully');
		return back();
	  }else{
	  	session()->flash('warning','Please select a manager at least');
	  	return back();
	  }	
	}
}
