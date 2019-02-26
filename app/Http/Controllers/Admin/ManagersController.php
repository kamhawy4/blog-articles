<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mangaers;
use Auth;


class ManagersController extends Controller
{	
    public function index()
    {
    	$mangaers =  Mangaers::where('id','!=',Auth::guard('managers')->user()->id)->get(); 
    	return view('admin.managers.index',compact('mangaers'));
    }

    public function create()
    {
    	return view('admin.managers.create');
    }

    public function edit($id)
    {
	    $update =  Mangaers::findOrFail($id);
    	return view('admin.managers.edit',compact('update'));
    }


	public function store(Request $request)
	{
	    $this->validate($request,[ 
	    'name'      => 'required|max:255',
	    'email'     => 'required|max:255|unique:mangaers|email',
	    'password'  => 'required|min:6',
	    ]);

    	$request   ->  merge(['password' => bcrypt($request->password)]); 

	    Mangaers::create($request->all());
	    session()->flash('save','The manager has been successfully added');
	    return redirect()->to(url('dashboard/managers'));
	}


	public function update($id,Request $request)
	{

		$this      -> validate($request,[ 
		'name'     => 'required|max:255',
		'email'    => 'required|max:255|email',
		]);
		
		$update    =  Mangaers::findOrFail($id); 
	    if($request->has('password')){
    	$request   ->  merge(['password' => bcrypt($request->password)]);
	    }else{
    	$request   ->  merge(['password' => $update->password]);}

		$update    -> update($request->all());
		session()->flash('success','Data modified successfully');
		return redirect()->to(url('dashboard/managers'));
	}


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


	public function DeleteMangaers(Request $request)
	{
	  if($request->check != '')
	  {
		Mangaers::destroy($request->check); 
		session()->flash('success','Data deleted successfully');
		return back();
	  }else{
	  	session()->flash('warning','Please select a manager at least');
	  	return back();
	  }	
	}
}
