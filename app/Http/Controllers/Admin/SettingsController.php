<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Support\Facades\Input;
use Storage;
use Session;
use Image;

class SettingsController extends Controller
{
  public function index()
  {
  	$setting =  Settings::first();
  	return view('admin.settings.index',compact('setting'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
          'name_site'        => 'required|min:5|max:35',
          'email'            => 'required|email',
          'phone'            => 'required|numeric',
          'meta_keywords'    => 'required',
          'address'          => 'required',
          'meta_description' => 'required',
          'brief_site'       => 'required',
          'logo_main'        => 'image|mimes:jpeg,bmp,png',
          'fav_main'         => 'image|mimes:jpeg,bmp,png',
        ],

          ['name_site.required'   =>'This Name Site field is required',
           'email.required'       =>'This Email field is required',
           'email.email'          =>'This Email Must be Mail',
           'phone.required'       =>'This Phone field is required',
           'phone.required'       =>'This Phone Must be Numeric',
           'keywords.required'    =>'This keywords field is required',
           'description.required' =>'This Description field is required',
           'brief_site.required'  =>'This Brief Site field is required',
           'logo_main.required'   =>'This Logo field is required',
           'logo_main.image'      =>'This Logo Must be Image',
           'fav_main.required'    =>'This Fav  field is required',
           'fav_main.image'       =>'This Fav  Must be Image',
          ]

      );


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

  public function update($id,Request $request)
  {    
    $this->validate($request,[
          'name_site'        => 'required|min:5|max:35',
          'email'            => 'required|email',
          'phone'            => 'required|numeric',
          'meta_keywords'    => 'required',
          'meta_description' => 'required',
          'brief_site'       => 'required',
          'logo_main'        => 'image|mimes:jpeg,bmp,png',
          'fav_main'         => 'image|mimes:jpeg,bmp,png',
        ],

          ['name_site.required'   =>'This Name Site field is required',
           'email.required'       =>'This Email field is required',
           'email.email'          =>'This Email Must be Mail',
           'phone.required'       =>'This Phone field is required',
           'phone.required'       =>'This Phone Must be Numeric',
           'keywords.required'    =>'This keywords field is required',
           'description.required' =>'This Description field is required',
           'brief_site.required'  =>'This Brief Site field is required',
           'logo_main.required'   =>'This Logo field is required',
           'logo_main.image'      =>'This Logo Must be Image',
           'fav_main.required'    =>'This Fav  field is required',
           'fav_main.image'       =>'This Fav  Must be Image',
          ]

      );

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
