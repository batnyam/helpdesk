<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Http\Controllers\Controller;
use Validator;
use Helpdesk\Answer;
use Auth;
use Helpdesk\Question;
use Helpdesk\User;
use Mail;

class AnswerController extends Controller
{
    public function newAnswer(Request $r, $id){

    	$validator = Validator::make($r->all(), [
    		'body' => 'required'
    	]);

    	if ( !$validator->fails() )
    	{
    		$answer = new Answer();
	    	$answer->body = $r->body;
	    	$answer->question = $r->id;
	    	$answer->created_user = Auth::id();
	    	$answer->Save();

        $q = new Question();
        $question = $q->getQuestionById($id);

        $user = new User();
        $qUser = $user->getUserById($question->created_user);

        $aUser = $user->getUserById($answer->created_user);

        if( $qUser->mailConf == 0 ){

          $data = array(
              'questionTitle' => $question->title,
      				'answerUser' => $aUser->username,
      				'questionId' => $id
          );

          Mail::send(['html' => 'emails.answer'], $data, function ($message) {
              $message->from('hbatnyam@gmail.com', 'Helpdesk');
              $message->to($qUser->email)->subject('Шинэ хариулт ирлээ!');
          });
        }

        sendMail($id, $answer->created_user);

        return redirect('/question-'.$id);
    	}
    }
}
