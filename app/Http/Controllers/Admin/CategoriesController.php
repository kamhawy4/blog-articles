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

   // Return view page index Categories And Return All Categories
   public function index()
    {
      $categorys =  Categories::get(); 
      return view('admin.category.index',compact('categorys'));
    }
   
	// Return view page create Categorys 
    public function create()
    {  
        return view('admin.category.create');   
    }

	// Return view page Edit Categorie And Return categorie by id
    public function edit($id)
    {
	    $update =  Categories::findOrFail($id);
        return view('admin.category.edit',compact('update'));
    }

  
	// Store Categorie 
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
        
        // Merge Slug and Categories Create  
        $request      -> merge(['slug'=>$this->make_slug($request->name)]); 
	    $allCategory  =  Categories::create($request->all());

        // render page  category create and returm it
        $html         =  view('admin.category.add',compact('allCategory'))->render();
	    return response()->json([ 'status'=> true,'code'=>200,'result'=>$html]);
	}

	// update Article 
	public function update($id,UpdateCategoriesRequest $request)
	{
		$update    =   Categories::findOrFail($id); 
		$request   ->  merge(['slug'=>$this->make_slug($request->name)]); 
		$update    ->  update($request->all());

        // render page  category edit and returm it
        $html       =  view('admin.category.edit',compact('update'))->render();
		return response()->json(['status'=>true,'code'=>200,'result'=>$html]);
	}

    // destroy Categories by id 
	public function destroy($id)
	{
		$delete  =  Categories::findOrFail($id);
		$delete  -> delete();
		session()->flash('save','Successfully deleted');
		return redirect()->to(url('dashboard/categorys'));
	}

    // destroy Multi Categories by id
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
