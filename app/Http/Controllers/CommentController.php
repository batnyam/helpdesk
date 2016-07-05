<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Http\Controllers\Controller;
use Helpdesk\Comment as Comment;

use Auth;
use Validator;

class CommentController extends Controller
{
    public function newComment(Request $r){

        $validator = Validator::make($r->all(), [
            'body' => 'required'
        ]);
        if(!$validator->fails()){
        	$c = new Comment();
        	$c->body = $r->body;
        	$c->question = $r->id;
        	$c->answer = $r->aId;
        	$c->created_user = Auth::id();
        	$c->score = 0;
        	$c->deleted = false;
        	$c->Save();
        }
        else return '1';
    }
}
