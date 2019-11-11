<?php

namespace App\Http\Controllers\Admin\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\SocialLinks;

use App\Http\Requests\Social\StoreSocialRequest;
use App\Http\Requests\Social\UpdateSocialRequest;
use App\Repositories\Social\SocialRepositories;

class SocialController extends Controller {
	
    protected $modelSocialLinks;

	public function __construct(SocialLinks $socialLinks)
	{
		$this->modelSocialLinks       = new SocialRepositories($socialLinks);

		$this->middleware('permission:social-list|social-create|social-edit|social-delete', ['only' => ['index','store']]);
         $this->middleware('permission:social-create', ['only' => ['create','store']]);
         $this->middleware('permission:social-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:social-delete', ['only' => ['destroy']]);   
	}

   // Return view page index SocialLinks And Return All SocialLinks
    public function index()
    {
      $social =  $this->modelSocialLinks->all();	  
      return view('admin.social.index',compact('social'));
    }
   
	// Return view page create Categorys 
    public function create()
    {  
       return view('admin.social.create');   
    }

	// Return view page Edit Categorie And Return categorie by id
    public function edit($id)
    {
		$update    =  $this->modelSocialLinks->show($id);		
        return view('admin.social.edit',compact('update'));
    }

  
	// Store social 
	public function store(StoreSocialRequest $request)
	{   
        $allSocial  =  $this->modelSocialLinks->store($request);
        // render page  social create and returm it

        // Log Activity
        \LogActivity::addToLog('Add New Social Link'.' : '.$allSocial->name);

        $html       =  view('admin.social.add',compact('allSocial'))->render();
	    return response()->json([ 'status'=> true,'code'=>200,'result'=>$html]);
	}
	

	// update social
	public function update($id,UpdateSocialRequest $request)
	{
		$update    = $this->modelSocialLinks->update($request,$id);
        //render page  social edit and returm it

        // Log Activity
        \LogActivity::addToLog('Update Social Link'.' : '.$update->name);


        $html      =  view('admin.social.edit',compact('update'))->render();
		return response()->json(['status'=>true,'code'=>200,'result'=>$html]);
	}
	

    // destroy Social by id 
	public function destroy($id)
	{
		$this->modelSocialLinks->delete($id);
		session()->flash('save','Successfully deleted');
		return redirect()->to(url('dashboard/social'));
	}


    // destroy Multi Social by id
	public function deleteSocial(Request $request)
	{
        if(!empty($request->check))
        {
		  $this->modelSocialLinks->deleteSocialCheck($request->check);
		  session()->flash('save','Successfully deleted');

		  // Log Activity
          \LogActivity::addToLog('Delete Social Links');

		  return back();
		  
          }else{
		  session()->flash('warning','Please select a section at least');
		  return back();
        }
    } 

}
