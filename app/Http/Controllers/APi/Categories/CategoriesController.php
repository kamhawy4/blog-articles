<?php

namespace App\Http\Controllers\Api\Categories;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;
use App\Repositories\Categories\CategoriesRepositories;

use Validator;

class CategoriesController extends Controller
{
    protected $modelCategories;

	public function __construct(Categories $categories)
	{
		$this->modelCategories  = new CategoriesRepositories($categories);	   
	}

   // Return view page index Categories And Return All Categories
    public function index()
    {
      $categorys =  $this->modelCategories->all();	  
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
		$update    =  $this->modelCategories->show($id);		
        return view('admin.category.edit',compact('update'));
    }

  
	// Store Categorie 
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'name'  =>'required|max:150|unique:categories',
        ]);

		if ($validator->passes()) {
	        // Merge Slug and Categories Create  
	        $request      -> merge(['slug'=>$this->make_slug($request->name)]); 
	        $allCategory  =  $this->modelCategories->store($request);
	        // render page  category create and returm it
	        $html         =  view('admin.category.add',compact('allCategory'))->render();
		    return response()->json([ 'status'=> true,'code'=>200,'result'=>$html]);
        }

    	return response()->json(['error'=>$validator->errors()->all()]);
	}
	

	// Update Categories 
	public function update($id,Request $request)
	{
		$validator = Validator::make($request->all(), [
            'name'  =>'required|max:150',
        ]);

		if ($validator->passes()) {
			$request   ->  merge(['slug'=>$this->make_slug($request->name)]); 
			$update    = $this->modelCategories->update($request,$id);
	        //render page  category edit and returm it
	        $html      =  view('admin.category.edit',compact('update'))->render();
			return response()->json(['status'=>true,'code'=>200,'result'=>$html]);
        }

    	return response()->json(['error'=>$validator->errors()->all()]);
	}
	

    // destroy Categories by id 
	public function destroy($id)
	{
		$this->modelCategories->delete($id);
		session()->flash('save','Successfully deleted');
		return redirect()->to(url('dashboard/categorys'));
	}


    // destroy Multi Categories by id
	public function deleteCategorys(Request $request)
	{
        if(!empty($request->check))
        {
		   $this->modelCategories->deleteCategoriesCheck($request->check);
		  session()->flash('save','Successfully deleted');
		  return back();
          }else{
		  session()->flash('warning','Please select a section at least');
		  return back();
        }
    } 

}
