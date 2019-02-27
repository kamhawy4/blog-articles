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
  public function index()
  {
  	$setting =  Settings::first();
  	return view('admin.settings.index',compact('setting'));
  }

  public function store(StoreSettingsRequest $request)
  {
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

    $settings  =  Settings::create($request->all());
    Session::flash('success','Update  Successfully');
    return back();
  }



  public function update($id,StoreSettingsRequest $request)
  {
  	$settings = Settings::find($id);

    if($request->hasFile('logo_main'))
    {
      $fav        =   Input::file('logo_main');
      $ext        =   $fav->getClientOriginalExtension();
      $path       =   public_path().'/uploads/logo';
      $fullename  =   time().'.'.$ext;
      $fav        ->  move($path,$fullename);
      $imaglogo   =   Image::make($path.'/'.$fullename);
      $request    ->  merge(['logo'=>$fullename]);

      $deleteimage = public_path().'/uploads/logo'.'/'.$settings->logo;
      File::delete($deleteimage);
    }

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

      $deleteimage = public_path().'/uploads/fav'.'/'.$settings->fav;
      File::delete($deleteimage);
    }

  	$settings->update($request->all());
    Session::flash('success','Update  Successfully');
  	return back();
  }


}
