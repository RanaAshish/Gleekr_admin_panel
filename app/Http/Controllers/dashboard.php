<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Activity;
use \Carbon\Carbon;

class dashboard extends Controller
{	
	public function __construct(Request $request){
		if(!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")){
			Redirect::to('login')->send();
		}
	}

    public function index(){
    	$data = [];
        $data['user_cnt'] = User::where('isDeleted', false)->count();
        $data['nuser_cnt'] = User::where('createdAt', '>=', Carbon::now()->subMonth())->count();
        $data['activity_cnt'] = Activity::where('isDeleted', false)->count();
        $data['nactivity_cnt'] = Activity::where('startDate', '>=', Carbon::now()->subMonth())->count();
        return view('dashboard', $data);   
    }

    public function logout(Request $request) {
		$request->session()->forget('logged_in');
		return redirect('login');
	}
}
