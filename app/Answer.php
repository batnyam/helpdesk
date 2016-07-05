<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

use Helpdesk\User as User;
use Mail;

class Answer extends Model
{
    protected $table = 'answer';
    protected $fillable = ['id', 'body', 'question', 'created_user', 'favouriteCount', 'deleted'];
    protected $hidden = ['created_at', 'updated_at'];

    public function __construct(){

    }

    // new Answer
    public function newAnswer(){
    	$this->body = $body;
    	$this->question = $question;
      $this->Save();

      $q = new Question();
      $questionInfo = $q->getQuestionById($question);

      $u = new User();
      $user = $u->getUserById($questionInfo->created_user);

      $data = array(
          'questionTitle' => $questionInfo->title,
  				'answerUser' => Auth::user()->username,
  				'questionId' => $question
      );

      Mail::send(['html' => 'emails.answer'], $data, function ($message) {
          $message->from('hbatnyam@gmail.com', 'Helpdesk');
          $message->to($user->email)->subject('Шинэ хариулт ирлээ!');
      });
    }

    // GET functions
    public function getAnswerByQuestion($id){
    	$answers = $this->where('question', $id)->orderBy('created_at')->get();
      $user = new User();
      $comment = new Comment();
      foreach($answers as $answer){
        $answer->user = $user->getUserById($answer->created_user);
        $answer->comments = $comment->getCommentByAnswer($answer->id);
      }
      return $answers;
    }

    public function getAnswersByUser($id){
        return $this->where('created_user', $id)->orderBy('created_at', 'desc')->get();
    }

    public function getAnswerById($id){
    	return $this->find($id);
    }

    public function getPopularAnswer(){
      $answers = $this->where('deleted', '0')->orderBy('favouriteCount', 'desc')->orderBy('created_at', 'desc')->take(10)->get();
      $user = new User();
      foreach ($answers as $answer) {
        $answer->user = $user->getUserById($answer->created_user);
      }
      return $answers;
    }

    // PUT functions
    public function updateAnswer($id, $body){
    	$answer = $this->find($id);
    	$answer->body = $body;
    }

    public function updateFav($id){
    	$answer = $this->find($id);
    	$answer->favouriteCount++;
    }

    // DELETE functions
    public function deleteAnswer($id){
    	$answer = $this->find($id);
    	$answer->deleted = true;
    }
}
