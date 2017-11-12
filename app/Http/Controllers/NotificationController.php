<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Model\User;
use PushNotification;

class NotificationController extends Controller
{
	public function __construct(Request $request){
		if(!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")){
			Redirect::to('login')->send();
		}
	}

    public function index(){
    	$data['users'] = User::all();
    	$data['active_users'] = User::where('isDeleted', false)->get();
    	$data['inactive_users'] = User::where('isDeleted', true)->get();
        return view('notification', $data);
    }

    public function sendNotification(){
        $user = User::find(request('user'));
        // return $user;
        if(empty($user->deviceToken)) {
            return back()->with('error','Device token is not exist.');
        }
        if( ctype_xdigit($user->deviceToken) && 64 == strlen($user->deviceToken )) {
            $devices = PushNotification::DeviceCollection(array(
            PushNotification::Device($user->device_token)
            ));
            PushNotification::app('gleekrIOS')->to($devices)->send(PushNotification::Message(request('msg')));
        } else {
           $devices = PushNotification::DeviceCollection(array(
            PushNotification::Device($user->device_token)
            ));
            PushNotification::app('gleekrAndroid')->to($devices)->send(PushNotification::Message(request('msg')));         
        }
        
        return back()->with('succ', 'Notification send successfully.');
    }
}
