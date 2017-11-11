<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\User;

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


            if ($userdata['username'] == "Gleekr" && $userdata['password'] == 'Gleekr') {
                // attempt to do the login
                $request->session()->put('logged_in', 'true');
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
        $id = "5a04356b285fafc4a550e63c";
        $user = User::find($id);
        Validator::extend('checkOldPwd', function($attribute, $value, $parameters) {
            return $value == 'foo';
        });
        
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required',
            'retype_new_password' => 'required|same:new_password',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('setting')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            
        }
    }

}
