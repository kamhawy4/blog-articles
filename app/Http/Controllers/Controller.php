<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Session,Image,Auth,DB,File;
// Laravel-FCM
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;


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


    public function SendNotification()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "fNvvyrB2QDc:APA91bGDP3ouPsFVDpBI_Oqz7uZprIhPuJeMFcPmS_FBdte6ZLwXqGTAJsY5I1srOLEC6fEdnrZzQxog9bqj6jgNUOiSyfCJNpLMxnX6fcwBxt6Pj8r19Q7ULJQrWXRrvAA9z0X89UZ-";
        

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        // return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

        // return Array (key : oldToken, value : new token - you must change the token in your database)
        $downstreamResponse->tokensToModify();

        // return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

        // return Array (key:token, value:error) - in production you should remove from your database the tokens
        $downstreamResponse->tokensWithError();
    }
}
