<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showLogin()
	{
	    // show the form
	    return view('login');
	}

	public function doLogin(Request $request)
	{
		// process the form
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required', // make sure the email is an actual email
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
				'username' 	=> $request->get('username'),
				'password' 	=> $request->get('password')
			);


			if($userdata['username'] == "Gleekr" && $userdata['password'] == 'Gleekr'){
				// attempt to do the login
		            $request->session()->put('logged_in','true');
		            return redirect('/');
			} else {
				// validation not successful, send back to form
				$request->session()->flash('error', 'Invalid username or password');
				return redirect('login');
			}
		}
	}

	public function logout(Request $request) {
		$request->session()->flush();
		return redirect('login');
	}
}
