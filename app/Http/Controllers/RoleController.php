<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Http\Controllers\Controller;

//App Models
use Helpdesk\role As Role;

class RoleController extends Controller
{
    public function newRole(){
    	$role = new Role();
    	$role->newRoleWithParam('admin');
    }

    public function get(){
    	$role = new Role();
    	$roles = $role->getRoles();
    	print_r($roles);
    }
}
