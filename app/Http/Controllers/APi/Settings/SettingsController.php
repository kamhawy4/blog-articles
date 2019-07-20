<?php

namespace App\Http\Controllers\Api\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\Settings\SettingsRepositories;
use App\Models\Settings;


class SettingsController extends Controller
{

  protected $modelSettings;

  function __construct(Settings $settings)
  {
    $this->modelSettings     = new SettingsRepositories($settings);
  }

  // Return Settings
  public function index()
  {
    $setting =  $this->modelSettings->all();
    return response()->json(['status'=>true,'code'=>200,'response'=>$setting]);
  }


}
