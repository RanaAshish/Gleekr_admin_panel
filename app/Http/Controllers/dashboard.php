<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class dashboard extends Controller
{
    	
    public function index(){
        $all_users = User::all();
        return $all_users;
    }

}
