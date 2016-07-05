<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\User as User;
use Hash;
use Auth;

class AuthController extends Controller
{
	public function show(){
		$user = new User();
		$user->username = 'batnyam';
		$user->password = '123456';
		$user->login();
	}
    
    public function login(Request $r){
    	$user = new User();
    	$user->username = $r->username;
    	$user->password = $r->password;
    	$user->login();
    	if (Auth::guest() != true ) {
    		echo 'success';//success
    	}
    }
}