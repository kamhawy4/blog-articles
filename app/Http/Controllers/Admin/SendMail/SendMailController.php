<?php

namespace App\Http\Controllers\Admin\SendMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Repositories\Users\UsersRepositories;
use App\Models\User;
use App\Http\Requests\SendMail\SendMailRequest;

class SendMailController extends Controller
{
    protected $modelUsers;

    function __construct(User $user)
    {
       $this->modelUsers = new UsersRepositories($user);
       $this->middleware('permission:sendmail',['only' => ['index','mail']]);
    }
    
    public function index()
    {
    	$users =  $this->modelUsers->all();
    	return view('admin.sendmail.index',compact('users'));
    }

    public function mail(SendMailRequest $request)
    {
        $title = $request->title;
        $desc  = $request->message;
        Mail::to($request->users)->send(new SendMailable($title,$desc));

        $this->SendNotification();

        // Log Activity
        \LogActivity::addToLog('Send Mail'.' : '.$title);

        session()->flash('success','Email was sent');
        return back();
    }


}
