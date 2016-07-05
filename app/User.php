<?php

namespace Helpdesk;

use Illuminate\Foundation\Auth\User as Authenticatable;

//App Models
use Helpdesk\role as Role;
use Helpdesk\rank as Rank;
use Auth;
use Hash;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['id', 'username', 'password', 'email', 'image', 'info', 'role', 'rank'];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function __construct(){

    }

    public function newUserWithParams(){
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
        $this->info = $info;
        $role = new Role();
        $this->role = $role->getBeginRole();
        $rank = new Rank();
        $this->rank = $rank->getBeginRank();
        $this->Save();
    }

    public function getUsers(){
        return $this->all();
    }

    public function getUserById($id){
        return $this->find($id);
    }

    public function getUserByUsername($username){
        return $this->where('username', $username);
    }

    public function getUserByEmail($email){
        return $this->where('email', $email);
    }

    public function getAuthUser(){
        return $this->id;
    }

    public function getCount(){
        return $this->count();
    }

    public function login(){

        $users = $this->where('username', $this->username)->get();
        foreach ($users as $user)
        {
            if ( Hash::check($this->password, $user->password)) {
                Auth::login($user);
            }
        }
    }

    public function getLoginUser(){
        return Auth::user();
    }

    public function userLogout(){
        Auth::logout();
    }
}
