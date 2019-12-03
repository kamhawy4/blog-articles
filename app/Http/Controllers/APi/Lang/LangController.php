<?php
namespace App\Http\Controllers\Api\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
 /**
 * Show greetings
 * 
 * @param Request $request [description]
 * @return [type] [description]
 */
 public function index(Request $request)
 {
   $data = [
     'home' => trans('app')
   ];
   return response()->json($data, 200);
 }
}