<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Group;
use App\Model\Activity;
use App\Model\Team;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function showLogin(Request $request) {
        if ($request->session()->has('logged_in') && $request->session()->get('logged_in') == "true") {
            Redirect::to('/')->send();
        } else {
            // show the form
            return view('login');
        }
    }

    public function doLogin(Request $request) {
        // process the form
        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required', // make sure the email is an actual email
            'password' => 'required' // password 
        );
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect('login')
                            ->withErrors($validator) // send back all errors to the login form
                            ->withInput(); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create our user data for the authentication
            $userdata = array(
                'username' => $request->get('username'),
                'password' => $request->get('password')
            );

            $row = json_decode(Team::where($userdata)->first(), true);

            if (!empty($row)) {
                // attempt to do the login
                $request->session()->put('logged_in', 'true');
                $request->session()->put('user', $row);
                return redirect('/');
            } else {
                // validation not successful, send back to form
                $request->session()->flash('error', 'Invalid username or password');
                return redirect('login');
            }
        }
    }

    public function setting() {
        return view('setting');
    }

    public function changePassword(Request $request) {
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required',
            'retype_new_password' => 'required|same:new_password',
        );
        $validator = Validator::make($request->all(), $rules);
        $user = $request->session()->get('user');
        if ($validator->fails()) {
            return redirect('setting')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if((request('old_password') != $user['password'])){
                 return back()->with('error','The specified password does not match the database password.');
            }else{
                DB::connection('mongodb')->collection('teams')->where('_id', $user['_id'])
                ->update(array("password" => request('new_password')), ['upsert' => true]);  
                return redirect('logout');
            }
        }
    }

    public function deleteDb(Request $request) {
        Group::turncate();
        return back()->with('succ', 'Database drop successfully.');
    }

}
