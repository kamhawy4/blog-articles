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
    public function uploadIMage($data,$path,$subPath,$size,$nameFile,$nameMerge)
    {
        $explode =  explode(',',$size);
        if($data->hasFile($nameFile))
        {
            $img        =  Input::file($nameFile);
            $ext        =  $img->getClientOriginalExtension();
            $path       =  public_path().$path;
            $fullename  =  time().'.'.$ext;
            $img        -> move($path,$fullename);
            $imag       =  Image::make($path.'/'.$fullename);
             if($subPath && $size  != null)
             {
                $imag->resize($explode[0],$explode[1])->save($path.$subPath.$fullename);
             }elseif($subPath  == null && $size != null ){
                $imag->resize($explode[0],$explode[1])->save($path.'/'.$fullename);
             }
            $data       -> merge([$nameMerge=>$fullename]);
        }
    }

    // Update upload Image  
    public function updateImage($update,$data,$path,$subPath,$size,$nameFile,$nameMerge)
    {
        $explode =  explode(',',$size);
        if($data->hasFile($nameFile))
        {

            $img        =  Input::file($nameFile);
            $ext        =  $img->getClientOriginalExtension();
            $path       =  public_path().$path;
            $fullename  =  time().'.'.$ext;
            $img        -> move($path,$fullename);
            $imag       =  Image::make($path.'/'.$fullename);
            $data       -> merge([$nameMerge=>$fullename]);

            if($subPath && $size  != null) {
                $imag->resize($explode[0],$explode[1])->save($path.$subPath.$fullename);
            }elseif($subPath  == null && $size != null ) {
                $imag->resize($explode[0],$explode[1])->save($path.'/'.$fullename);
            }

            if($subPath !=  null) {
              $small     =  $path.$subPath.$update->$nameMerge;
              File::delete($small);
            }

            $big        =  $path.'/'.$update->$nameMerge;
            File::delete($big);
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
