<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Http\Controllers\Controller;

use Helpdesk\Question as Question;
use Helpdesk\Answer as Answer;
use Helpdesk\Rank as Rank;
use Helpdesk\Tag as Tag;
use Helpdesk\User as User;
use Helpdesk\Comment as Comment;
use Auth;
use Redirect;
use Channel;
use Validator;

class QuestionController extends Controller
{
    public function getQuestion($id){
    	$question = new Question();
    	$question = $question->getQuestionById($id);
    	$question[0]->viewCount++;
    	$question[0]->Save();
    	$question = $question[0];

        $comments = new Comment();
        $question->comments = $comments->getCommentByQuestion($question->id);
        $commentUser = new User();

        foreach ($question->comments as $comment) {
            $comment->created_user = $commentUser->getUserById($comment->created_user);
        }

    	$tag = new Tag();
    	$tags = $tag->getTagByQuestion($id);
    	$question->tags = $tags;

    	$user = new User();
    	$created_user = $user->getUserById($question->created_user);
    	$question->username = $created_user->username;

    	$rank = new Rank();
    	$rankname = $rank->getRankById($created_user->rank);
    	$question->rankName = $rankname[0]->name;

      $answer = new Answer();
      $answers = $answer->getAnswerByQuestion($question->id);
      $comment = new Comment();
      foreach($answers as $answer){
        $answer->comments = $comment->getCommentByAnswer($answer->id);
        foreach($answer->comments as $com ){
          $com->user = $user->getUserById($com->created_user);
        }
      }

      $hotQuestions = $question->getQuestionByFavCount();
      $popQuestions = $question->getHotQuestions();
    	return view('question', ['question' => $question, 'answers' => $answers, 'hotQuestions' => $hotQuestions, 'popQuestions' => $popQuestions]);
    }

    public function showEditor(){
        $rank = new Rank();
        $ranks = $rank->getRanks();
        return view('ask',['ranks' => $ranks, 'id' => null]);
    }

    public function post(Request $r){
        $validator = Validator::make($r->all(), [
            'title' => 'required|unique:question|max:255',
            'body' => 'required',
        ]);

        if( $validator->fails() ){
            showEditor();
            return;
        }


    	$question = new Question();
    	$question->title = $r->title;
    	$question->body = $r->body;

      if($r->minRank)
      {
          $question->minRank = $r->minRank;
      }
      else $question->minRank = 0;
      if($r->maxRank )
      {
        if ( $r->minRank < $r->maxRank ) $question->maxRank = $r->maxRank;
      	else {
      		$rank = new Rank();
      		$maxrank = $rank->getMaxRank();
      		$question->maxRank = $maxrank;
      	}
      }
      else $question->maxRank = 0;

    	$question->created_user = Auth::id();

      if( $r->channel != NULL )
      {
        $question->channel = $r->channel;
      }
      else $question->channel = NULL;
    	$question->answerCount = 0;
    	$question->favouriteCount = 0;
    	$question->viewCount = 0;
    	$question->published = 1;
    	$question->deleted = 0;

    	$question->Save();

      if( $r->channel != NULL ){
        $c = new Channel();
        $channel = $c->getChannelInfo($r->channel);

        $u = new User();
        $user = $u->getUserById($channel->created_user);

        if( $qUser->mailConf == 0 ){

          $data = array(
              'questionTitle' => $channel->title,
      				'answerUser' => Auth::user()->username,
      				'questionId' => $question->id
          );

          Mail::send(['html' => 'emails.answer'], $data, function ($message) {
              $message->from('hbatnyam@gmail.com', 'Helpdesk');
              $message->to($user->email)->subject('Шинэ хариулт ирлээ!');
          });
        }
      }

    	$id = $question->id;

      $tagString = $r->tag;


      do{
        $str_index = strpos($tagString, ',');
        if( !empty($str_index) ){
            $tag = new Tag();
            $tag->name = substr($tagString, 0, $str_index);
            $tag->question = $id;
            $tag->created_user = $question->created_user;
            $tag->updated_user = $question->created_user;
            $tag->Save();
            $tagString = substr($tagString, $str_index+1, strlen($tagString));
        }
        else break;
      }while(strlen($tagString) > 0);
      $tag = new Tag();
      $tag->name = $tagString;
      $tag->question = $id;
      $tag->created_user = $question->created_user;
      $tag->updated_user = $question->created_user;
      $tag->Save();

    	return Redirect::to('/question-'.$id);
    }

    public function channelPost($id){
      return view('ask',['id' => $id, 'ranks' => NULL]);
    }

    // Vote Up, Down function
    public function voteUp($id, $count){
        $q = new Question();
        $question = $q->getQuestionById($id);
        $question[0]->favouriteCount++;
        $question[0]->Save();
    }

    public function voteDown($id, $count){
        $q = new Question();
        $question = $q->getQuestionById($id);
        $question[0]->favouriteCount--;
        $question[0]->Save();
    }

    public function getQuestionByTagName($name){
        $q =  new Question();
        $questions = $q->getQuestionByTag($name);
        $hotQuestions = $q->getQuestionByFavCount();
        $popQuestions = $q->getHotQuestions();
        return view('tag', ['questions' => $questions[0], 'tagName' => $name, 'hotQuestions' => $hotQuestions, 'popQuestions' => $popQuestions]);
    }

    public function getQuestionByUser($id){
      $question = new Question();
      $questions = $question->getQuestionByUser($id);
      $hotQuestions = $question->getQuestionByFavCount();
      $popQuestions = $question->getHotQuestions();
      $user = new User();
      $name = $user->getUserById($id);
      return view('userQuestions', ['questions' => $questions, 'username' => $name->username, 'hotQuestions' => $hotQuestions, 'popQuestions' => $popQuestions]);
    }

    public function sendMail($Cid, $qTitle, $qId){
      return "gg";

    }

}
