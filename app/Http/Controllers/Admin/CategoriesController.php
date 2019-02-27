<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;

use App\Http\Requests\Categories\StoreCategoriesRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
   public function index()
    {
      $categorys =  Categories::get(); 
      return view('admin.category.index',compact('categorys'));
    }

    public function create()
    {  
        return view('admin.category.create');   
    }

    public function edit($id)
    {
	    $update =  Categories::findOrFail($id);
        return view('admin.category.edit',compact('update'));
    }


	public function store(StoreCategoriesRequest $request)
	{
	    $categorys =  Categories::get();
	    if(count($categorys) > 0) 
	    {
		   foreach ($categorys as  $value) 
		    {
		    	if($value->name == $request->name)
		    	{
		    	  return response()->json(['status'=>false,'code'=>300]);
		    	}
		    }
		}
        
        $request      -> merge(['slug'=>$this->make_slug($request->name)]); 
	    $allCategory  =  Categories::create($request->all());
        $html         =  view('admin.category.add',compact('allCategory'))->render();
	    return response()->json([ 'status'=> true,'code'=>200,'result'=>$html]);
	}


	public function update($id,UpdateCategoriesRequest $request)
	{
		$update    =   Categories::findOrFail($id); 
		$request   ->  merge(['slug'=>$this->make_slug($request->name)]); 
		$update    ->  update($request->all());
        $html       =  view('admin.category.edit',compact('update'))->render();
		return response()->json(['status'=>true,'code'=>200,'result'=>$html]);
	}


	public function destroy($id)
	{
		$delete  =  Categories::findOrFail($id);
		$delete  -> delete();
		session()->flash('save','Successfully deleted');
		return redirect()->to(url('dashboard/categorys'));
	}


	public function deleteCategorys(Request $request)
	{
        if($request->check != '')
        {
		  Categories::destroy($request->check); 
		  session()->flash('save','Successfully deleted');
		  return back();
          }else{
		  session()->flash('warning','Please select a section at least');
		  return back();
        }
    } 
}
