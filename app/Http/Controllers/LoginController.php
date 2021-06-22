<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use Carbon\Carbon;

class LoginController extends Controller
{
        public function __construct()
    {

    }

        public function login()
    {
		$data['title']='Login';
		if(Auth::user()){
			return redirect()->intended('user/dashboard');
		}else{
	        return view('/auth/login', $data);
		}
    } 

        
        public function submitlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required'
        ]);
        if($validator->fails()) {
            // adding an extra field 'error'...
            $validator->errors()->add('error', 'true');
            return response()->json($validator->errors());
        }
    	if(Auth::attempt(['email' => $request->email,'password' => $request->password,])){
        	$ip_address=user_ip();
        	$user=User::find(Auth::user()->id);
        	$set=$data['set']=Settings::first();
        	if($ip_address!=$user->ip_address & $set['email_notify']==1){
    			send_email($user->email, $user->username, 'Suspicious Login Attempt', 'Sorry your account was just accessed from an unknown IP address<br> ' .$ip_address. '<br>If this was you, please you can ignore this message or reset your account password.');
        	}
	        $user->last_login=Carbon::now();
	        $user->ip_address=$ip_address;
	        $user->save();
            return redirect()->intended('user/dashboard');
        } else {
        	return back()->with('alert', 'Oops! You have entered invalid credentials');
        }

    }

}
