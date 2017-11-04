<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Model\Activity;
use App\Model\User;
use \Carbon\Carbon;

class Activities extends Controller
{
	public function __construct(Request $request){
		if(!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")){
			Redirect::to('login')->send();
		}
	}

    public function index() {
    	$data['activities'] = Activity::where('isDeleted', false)->with('user')->get();
    	// $users = User::where('isDeleted', false)->get();
    	// return $users[0]['activities'];
    	return view('activity', $data);
    }
}