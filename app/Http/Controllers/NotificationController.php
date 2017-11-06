<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Model\User;

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
}
