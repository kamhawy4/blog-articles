<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\Settings\StoreSettingsRequest;
use App\Models\Settings;
use Storage,Session,Image,File;
use App\Repositories\Settings\SettingsRepositories;


class SettingsController extends Controller
{

  	//PROPRTE Upload
    const PATHLOGO      = '/uploads/logo';
    const SUBPATHLOGO   =  null;
    const SIZELOGO      =  null;
    const NAMEFILELOGO  = 'logo_main';
    const NAMEMERGELOGO = 'logo';

    const PATHFAV      = '/uploads/fav';
    const SUBPATHFAV   =  null;
    const SIZEFAV      =  '50,50';
    const NAMEFILEFAV  =  'fav_main';
    const NAMEMERGEFAV =  'fav';


    protected $modelSettings;

  function __construct(Settings $settings)
  {
    $this->modelSettings     = new SettingsRepositories($settings);
  }

  // Return view page settings And Return first Settings
  public function index()
  {
    $setting =  $this->modelSettings->all();
  	return view('admin.settings.index',compact('setting'));
  }


  // Store Settings 
  public function store(StoreSettingsRequest $request)
  {
     // upload logo
     $this->uploadIMage($request,self::PATHLOGO,self::SUBPATHLOGO,self::SIZELOGO,self::NAMEFILELOGO,self::NAMEMERGELOGO);
    
    // upload favicon
    $this->uploadIMage($request,self::PATHFAV,self::SUBPATHFAV,self::SIZEFAV,self::NAMEFILEFAV,self::NAMEMERGEFAV);
    
    // create data
    $settings  =  $this->modelSettings->store($request);

    Session::flash('success','Update  Successfully');
    return back();
  }


  //Update Settings 
  public function update($id,StoreSettingsRequest $request)
  {
    // get data Settings by id 
		 $update    =  $this->modelSettings->show($id);

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
      $deleteimage = public_path().'/uploads/logo'.'/'.$update->logo;
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
		$this->modelSettings->update($request,$id);    
    Session::flash('success','Update  Successfully');
  	return back();
  }


}
