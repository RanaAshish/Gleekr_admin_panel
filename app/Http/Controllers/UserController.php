<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    public function index(){
        $all_users = json_decode(User::all(),TRUE);
        return view('users',["users"=>$all_users]);   
    }

    public function user_profile($id){
        $user = User::find($id);
        return view('user_profile',["user"=>$user]); 
    }
}
