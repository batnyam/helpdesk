<?php

namespace Helpdesk;

use Illuminate\Database\Eloquent\Model;

use Helpdesk\Tag as Tag;
class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['id', 'title', 'body', 'minRank', 'maxRank', 'created_user', 'channel', 'answerCount', 'favouriteCount', 'viewCount', 'published', 'deleted', 'created_at', 'updated_at', 'deleted'];
    protected $hidden = [];

    public function __construct(){

    }

    // Create new Question
    public function newQuestion($title, $body, $minRank, $maxRank, $created_user, $channel){
    	$this->title = $title;
    	$this->body = $body;
    	$this->minRank = $minRank;
    	$this->maxRank = $maxRank;
    	$this->created_user = $created_user;
      if( $channel != 0 )
    	 $this->channel = $channel;
      else $this->channel = "";
    	$this->Save();
    }

    // GET functions
    public function getCount(){
        return $this->count();
    }
    public function getQuestions(){
    	return $this->all();
    }

    public function getQuestionById($id){
    	return $this->join('users', 'created_user', '=', 'users.id' )->where('question.id', $id)->select('users.*', 'question.*')->get();
    }

    public function getQuestionByRank($min, $max){
    	return 1;
    }

    public function getQuestionByUser($userId){
    	$questions = $this->where('created_user', $userId)->where('published', 1)->orderBy('created_at', 'desc')->get();
      $user = new User();
      foreach($questions as $question){
        $question->user = $user->getUserById($question->created_user);
      }
      return $questions;
    }

    public function getQuestionByChannel($channel){
    	$questions = $this->join('users', 'created_user', '=', 'users.id' )->where('channel', $channel)->select('users.*', 'question.*')->get();
        $tag = new Tag();
        foreach($questions as $question )
        {
            $question->tags = $tag->getTagByQuestion($question->id);
        }
        return $questions;
    }

    public function getQuestionByFavCount(){
        $questions = $this->where('published', 1)->orderBy('favouriteCount', 'desc')->orderBy('viewCount', 'desc')->take(5)->get();
        $user = new User();
        foreach($questions as $question){
          $question->user = $user->getUserById($question->created_user);
        }
        return $questions;
    }

    public function getHotQuestions(){
        $questions = $this->where('published', 1)->orderBy('answerCount', 'desc')->orderBy('commentCount', 'desc')->take(5)->get();
        $user = new User();
        foreach($questions as $question){
          $question->user = $user->getUserById($question->created_user);
        }
        return $questions;
    }

    public function getQuestionByTag($name){
        $tag = new Tag();
        $tagQuestions = $tag->getTagByName($name);
        $question = new Question();
        $questions = [];
        foreach ($tagQuestions as $tag) {
            $q = new Question();
            $q = $question->getQuestionById($tag->question);
            $q->tags = $tag->getTagByQuestion($tag->question);
            array_push($questions, $q);
        }
        return $questions;
    }

    public function getUnansweredQuestion(){
        $user = new User();
        $questions = $this->where('published', 1)->where('deleted', '0')->orderBy('answerCount', 'asc')->orderBy('created_at', 'desc')->take(10)->get();
        foreach ($questions as $q) {
          $q->user = $user->getUserById($q->created_user);
        }
        return $questions;
    }

    // PUT functions
    public function updateQuestion($title, $body, $minRank, $maxRank, $channel){
    	$this->title = $title;
    	$this->body = $body;
    	$this->minRank = $minRank;
    	$this->maxRank = $maxRank;
    	$this->channel = $channel;
    	$this->Save();
    }

    public function published(){
    	if ( $this->published )
	    	$this->published = false;
	    else $this->published = true;
    }

    // DELETE Functions
    /*public function delete($id){
    	$post = $this->find($id);
    	$post->deleted = true;
    }*/
}
