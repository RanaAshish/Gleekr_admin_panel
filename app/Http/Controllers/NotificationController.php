<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Model\User;
use App\Model\Notification;
use PushNotification;

class NotificationController extends Controller {

    public function __construct(Request $request) {
        if (!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")) {
            Redirect::to('login')->send();
        }
    }

    public function index() {
        $data['users'] = User::all();
        $data['messages'] = Notification::all();        
        return view('notification', $data);
    }
    
    public function pushNotification($token){
        if (ctype_xdigit($token) && 64 == strlen($token)) {
            /* $devices = PushNotification::DeviceCollection(array(
              PushNotification::Device($user->device_token)
              ));
              PushNotification::app('gleekrIOS')->to($devices)->send(PushNotification::Message(request('msg'))); */
        } else {
            /* $devices = PushNotification::DeviceCollection(array(
              PushNotification::Device($user->device_token)
              ));
              PushNotification::app('gleekrAndroid')->to($devices)->send(PushNotification::Message(request('msg'))); */
        }
    }
    
    public function sendNotification(Request $request) {
        $team = $request->session()->get('user');
        $userArray = [];
        $msg = new Notification();
        if ($request->group == 'to_group') {
            if ($request->groupselect == 'all') {
                $userAllData = User::select('_id','deviceToken')->where('deviceToken','exists',true)->get()->toArray();
                $userArray = array_column($userAllData,'_id');
                foreach ($userAllData as $key => $value) {
                    $this->pushNotification($value['deviceToken']);
                }
                $msg->target_user = "All";
            } else if ($request->groupselect == 'active') {
                $userAllData = User::select('_id','deviceToken')
                        ->where('deviceToken','exists',true)
                        ->where('isDeleted', false)
                        ->get()->toArray();
                $userArray = array_column($userAllData,'_id');
                $msg->target_user = "Active Users";
            } else {
                $userAllData = User::select('_id','deviceToken')
                        ->where('deviceToken','exists',true)
                        ->where('isDeleted', true)
                        ->get()->toArray();
                $userArray = array_column($userAllData,'_id');
                $msg->target_user = "Inactive Users";
            }
        } else {
            $user = User::find($request->get('userselect'));
            if (empty($user->deviceToken)) {
                return back()->with('error', 'Device token is not exist.');
            }
            $this->pushNotification($user->deviceToken);
            $userArray = array($request->get('userselect'));
            $msg->target_user = $user->name;
        }

        $msg->message = $request->get('msg');
        $msg->user_id = $userArray;
        $msg->team_id = $team['_id'];

        $msg->save();
        return back()->with('succ', 'Notification send successfully.');
    }
}
