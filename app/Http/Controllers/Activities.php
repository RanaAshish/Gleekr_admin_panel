<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Activity;
use \Carbon\Carbon;

class Activities extends Controller
{
    public function index() {
    	$data['activities'] = Activity::where('isDeleted', false)->get();
    	return view('activity', $data);
    }
}