<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Session,Image,Auth,DB,File;


class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // upload Image 
    public function uploadIMage($path,$data)
    {
        if($data->hasFile('img'))
        {
            $img        =  Input::file('img');
            $ext        =  $img->getClientOriginalExtension();
            $path       =  public_path().$path;
            $fullename  =  time().'.'.$ext;
            $img        -> move($path,$fullename);
            $imag       =  Image::make($path.'/'.$fullename);
            $imag       -> resize(100,100)->save($path.'/100x100/'.$fullename);
            $data       -> merge(['image'=>$fullename]);
        }
    }

    // Update upload Image  
    public function UpdateImage($path,$update,$data)
    {
        if($data->hasFile('img'))
        {
            $img        =  Input::file('img');
            $ext        =  $img->getClientOriginalExtension();
            $path       =  public_path().$path;
            $fullename  =  time().'.'.$ext;
            $img        -> move($path,$fullename);
            $imag       =  Image::make($path.'/'.$fullename);
            $imag       -> resize(100,100)->save($path.'/100x100/'.$fullename);
            $data      -> merge(['image'=>$fullename]);
            $small      =  public_path().$path.'/100x100/'.$update->image;
            $big        =  public_path().$path.'/'.$update->image;
            File::delete($big,$small);
        }
    }

    /**
    * @return slug 
    */  
    public function make_slug($string = null, $separator = "-") 
    {
        if (is_null($string)) {
            return "";
        }
        // Remove spaces from the beginning and from the end of the string
        $string = trim($string);

        // Lower case everything 
        // using mb_strtolower() function is important for non-Latin UTF-8 string | more info: http://goo.gl/QL2tzK
        $string = mb_strtolower($string, "UTF-8");

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and arabic charactrs as well
        $string = preg_replace("/[^a-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

        // Remove multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);

        // Convert whitespaces and underscore to the given separator
        $string = preg_replace("/[\s_]/", $separator, $string);

        return str_limit($string, 100, '');
    }
}
