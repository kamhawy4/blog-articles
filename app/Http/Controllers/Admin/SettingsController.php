<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Settings\StoreSettingsRequest;
use App\Models\Settings;

use Storage,Session,Image;

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
            $image      = $request->file('logo_main');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img        = Image::make($image->getRealPath());
            $img->resize(120, 120, function($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::put('logo'.'/'.$fileName, $img, 'public');
            Storage::put('logo/100x100'.'/'.$fileName, $img, 'public');
            $request->merge(['logo'=>'logo'.'/'.$fileName]);
    }

    if($request->hasFile('fav_main'))
    {
        $image      = $request->file('fav_main');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img        = Image::make($image->getRealPath());
        $img->resize(50,50, function($constraint) {
        $constraint->aspectRatio();                 
        });
        $img->stream(); // <-- Key point
        Storage::put('fav'.'/'.$fileName, $img, 'public');
        $request->merge(['fav'=>'fav'.'/'.$fileName]);
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
        !empty($settings->logo)?Storage::delete($settings->logo):'';

            $image      = $request->file('logo_main');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img        = Image::make($image->getRealPath());
            $img->resize(120, 120, function($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream(); // <-- Key point
            Storage::put('logo'.'/'.$fileName, $img, 'public');
            Storage::put('logo/100x100'.'/'.$fileName, $img, 'public');
            $request->merge(['logo'=>'logo'.'/'.$fileName]);
    }

    if($request->hasFile('fav_main'))
    {
       !empty($settings->fav)?Storage::delete($settings->fav):'';
        $image      = $request->file('fav_main');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img        = Image::make($image->getRealPath());
        $img->resize(50,50, function($constraint) {
        $constraint->aspectRatio();                 
        });
        $img->stream(); // <-- Key point
        Storage::put('fav'.'/'.$fileName, $img, 'public');
        $request->merge(['fav'=>'fav'.'/'.$fileName]);
    }

  	$settings->update($request->all());
    Session::flash('success','Update  Successfully');
  	return back();
  }


}
