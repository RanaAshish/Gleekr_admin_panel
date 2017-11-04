<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NotificationController extends Controller
{
	public function __construct(Request $request){
		if(!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")){
			Redirect::to('login')->send();
		}
	}

    public function index(){
        return view('notification');
    }
}
