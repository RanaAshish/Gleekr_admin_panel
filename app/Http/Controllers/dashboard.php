<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Activity;
use \Carbon\Carbon;

class dashboard extends Controller
{	
    public function index(){
    	$data = [];
        $data['user_cnt'] = User::where('isDeleted', false)->count();
        $data['nuser_cnt'] = User::where('createdAt', '>=', Carbon::now()->subMonth())->count();
        $data['activity_cnt'] = Activity::where('isDeleted', false)->count();
        $data['nactivity_cnt'] = Activity::where('startDate', '>=', Carbon::now()->subMonth())->count();
        return view('dashboard', $data);   
    }
}
