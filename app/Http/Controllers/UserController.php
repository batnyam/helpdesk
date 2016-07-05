<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;

use Helpdesk\Role as Role;
use Helpdesk\Rank as Rank;
use Helpdesk\User as User;
use Hash;
use Redirect;
use Validator;

class UserController extends Controller
{
    public function signup(Request $r){

        $validator = Validator::make($r->all(), [
            'username' => 'required|max:30|unique:users',
            'password' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|same:password'
        ]);

        if( $validator->fails() )
        {
            return view('signup');
        }

    	$user = new User();
    	$role = new Role();
        $roleId = $role->getFirstRole();
        $rank = new Rank();
        $rankId = $rank->getFirstRank(); 
    	$user->username = $r->username;

    	$user->password = Hash::make($r->password);
    	$user->email = $r->email;
    	//$user->image = $r->image;
    	$user->info = $r->info;
    	$user->role = $roleId[0]->id;
    	$user->rank = $rankId[0]->id;
        $user->Save();
        return Redirect::to('/');
    }
}
