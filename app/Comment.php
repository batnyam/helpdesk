<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;
use Helpdesk\User;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillabel = ['id', 'body', 'question', 'answer', 'created_user', 'score', 'deleted', 'created_at', 'updated_at'];
    protected $hidden = [];

    public function __construct(){

    }

    // GET functions
    public function getCommentByQuestion($id){
    	return $this->where('question', $id)->get();
    }

    public function getCommentByAnswer($id){
      $comments = $this->where('answer', $id)->orderBy('created_at', 'desc')->get();
      $user = new User();
      foreach($comments as $comment){
        $comment->user = $user->getUserById($comment->created_user);
      }
      return $comments;
    }

    public function getCommentByUser($id){
        return $this->where('created_user', $id)->orderBy('created_at', 'desc')->get();
    }

    // PUT functions

    public function putComment($id, $body){
    	$comment = $this->find($id);
    	$comment->body = $body;
    	$comment->Save();
    }

    // DELETE functions

    public function deleteComment($id){
    	$comment = $this->find($id);
    	$comment->deleted = true;
    	$comment->Save();
    }
}
