<?php

namespace App\Http\Controllers\Admin\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Tags;
use App\Models\TagsTranslations;
use App\Repositories\Tags\TagsRepositories;
use Validator;

class TagsController extends Controller {

    protected $modelTags;

	public function __construct(TagsTranslations $tagsTranslations,Tags $tags)
	{
		$this->modelTags       = new TagsRepositories($tagsTranslations,$tags);

		$this->middleware('permission:tag-list|tag-create|tag-edit|tag-delete', ['only' => ['index','store']]);
         $this->middleware('permission:tag-create', ['only' => ['create','store']]);
         $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tag-delete', ['only' => ['destroy']]);
	}

   // Return view page index tags And Return All tags
    public function index()
    {
      $tags =  $this->modelTags->all();	  
      return view('admin.tags.index',compact('tags'));
    }
   
	// Return view page create tags 
    public function create()
    {  
       return view('admin.tags.create');   
    }

	// Return view page Edit tags And Return categorie by id
    public function edit($id)
    {
		$update    =  $this->modelTags->show($id);		
        return view('admin.tags.edit',compact('update'));
    }

  
	// Store tags 
	public function store(Request $request)
	{
	   $validator = Validator::make($request->all(), [
           'name'  =>'required|max:150|unique:tags_translations',
       ]);   

     if ($validator->passes()) {
        // Merge Slug and tags Create  
        $request      -> merge(['slug'=>$this->make_slug($request->name)]); 
        $allTags       =  $this->modelTags->store($request);
        // render page  tags create and returm it
        $html         =  view('admin.tags.add',compact('allTags'))->render();

	    // Log Activity
        \LogActivity::addToLog('Add New Tag'.' : '.$request->name);

	    return response()->json([ 'status'=> true,'code'=>200,'result'=>$html]);
	  }

       return response()->json(['error'=>$validator->errors()->all()]);

	}
	

	// update tags 
	public function update($id,Request $request)
	{
		$validator = Validator::make($request->all(), [
            'ar_name'  =>'required|max:150',
            'en_name'  =>'required|max:150',
        ]);

	    if($validator->passes()) {
			$update    = $this->modelTags->update($request,$id);
	        //render page  tags edit and returm it
	        $html      =  view('admin.tags.edit',compact('update'))->render();

	        // Log Activity
            \LogActivity::addToLog('Update Tag'.' : '.$request->name);

			return response()->json(['status'=>true,'code'=>200,'result'=>$html]);
		}

      return response()->json(['error'=>$validator->errors()->all()]);
	}
	

    // destroy tags by id 
	public function destroy($id)
	{
		$this->modelTags->delete($id);
		session()->flash('save','Successfully deleted');
		return redirect()->to(url('dashboard/tags'));
	}


    // destroy Multi tags by id
	public function deleteTgas(Request $request)
	{
        if(!empty($request->check))
        {
		  $this->modelTags->deleteTagsCheck($request->check);

		  // Log Activity
          \LogActivity::addToLog('Delete Tags');

		  session()->flash('save','Successfully deleted');
		  return back();
          }else{
		  session()->flash('warning','Please select a tag at least');
		  return back();
        }
    } 

}
