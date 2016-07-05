<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function __construct(){
    }

    public function newRoleWithParam($name){
    	$this->name = $name;
    	$this->Save();
    }

    public function getRoles(){
    	return $this->all();
    }

    public function getRoleByName($name){
    	return $this->where('name', $name)->first();
    } 

    public function getRoleById($id){
    	return $this->find($id);
    }

    public function getFirstRole(){
        return $this->first()->take(1)->get();
    } 
}
