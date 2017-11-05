<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Activity;
use App\Model\User;
use \Carbon\Carbon;

class Activities extends Controller
{
    public function index() {
    	$data['activities'] = Activity::where('isDeleted', false)->with('user')->get();
    	// $users = User::first()->contacts;
    	// return $users;
    	// return $data['activities'][0];
    	return view('activity', $data);
    }
}