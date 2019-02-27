<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\Settings\StoreSettingsRequest;
use App\Models\Settings;
use Storage,Session,Image,File;

class SettingsController extends Controller
{

  // Return view page settings And Return first Settings
  public function index()
  {
  	$setting =  Settings::first();
  	return view('admin.settings.index',compact('setting'));
  }


  // Store Settings 
  public function store(StoreSettingsRequest $request)
  {

     // upload logo
    if($request->hasFile('logo_main'))
    {
      $fav        =   Input::file('logo_main');
      $ext        =   $fav->getClientOriginalExtension();
      $path       =   public_path().'/uploads/logo';
      $fullename  =   time().'.'.$ext;
      $fav       ->   move($path,$fullename);
      $imaglogo   =   Image::make($path.'/'.$fullename);
      $request    ->  merge(['logo'=>$fullename]);
    }
    
    // upload favicon
    if($request->hasFile('fav_main')) {
      $fav        =   Input::file('fav_main');
      $ext        =   $fav->getClientOriginalExtension();
      $path       =   public_path().'/uploads/fav';
      $fullename  =   time().'.'.$ext;
      $fav        ->  move($path,$fullename);
      $imagfav    =   Image::make($path.'/'.$fullename);
      $imagfav    ->  resize(50,50)->save($path.'/'.$fullename);
      $request    ->  merge(['fav'=>$fullename]);
    }
    
    // create data
    $settings  =  Settings::create($request->all());
    Session::flash('success','Update  Successfully');
    return back();
  }


  //Update Settings 
  public function update($id,StoreSettingsRequest $request)
  {
    // get data Settings by id 
   	$settings = Settings::find($id);
  
    // upload logo
    if($request->hasFile('logo_main'))
    {
      $fav        =   Input::file('logo_main');
      $ext        =   $fav->getClientOriginalExtension();
      $path       =   public_path().'/uploads/logo';
      $fullename  =   time().'.'.$ext;
      $fav        ->  move($path,$fullename);
      $imaglogo   =   Image::make($path.'/'.$fullename);
      $request    ->  merge(['logo'=>$fullename]);
      
      // delete old logo after update new logo
      $deleteimage = public_path().'/uploads/logo'.'/'.$settings->logo;
      File::delete($deleteimage);
    }

    // upload favicon
    if($request->hasFile('fav_main'))
    {
      $fav        =   Input::file('fav_main');
      $ext        =   $fav->getClientOriginalExtension();
      $path       =   public_path().'/uploads/fav';
      $fullename  =   time().'.'.$ext;
      $fav        ->  move($path,$fullename);
      $imagfav    =   Image::make($path.'/'.$fullename);
      $imagfav    ->  resize(50,50)->save($path.'/'.$fullename);
      $request    ->  merge(['fav'=>$fullename]);
      
      // delete old favicon after update new favicon
      $deleteimage = public_path().'/uploads/fav'.'/'.$settings->fav;
      File::delete($deleteimage);
    }
   
    // update data
  	$settings->update($request->all());
    Session::flash('success','Update  Successfully');
  	return back();
  }


}
