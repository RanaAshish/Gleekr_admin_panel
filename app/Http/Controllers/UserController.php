<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	public function __construct(Request $request){
		if(!($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true")){
			Redirect::to('login')->send();
		}
	}

    public function index(){
        $all_users = User::all();
        return view('users',["users"=>$all_users]);   
    }

    public function user_profile($id){
        $user = User::find($id);
        return view('user_profile',["user"=>$user]); 
    }
}
