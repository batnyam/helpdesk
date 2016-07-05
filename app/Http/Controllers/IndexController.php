<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Channel as Channel;
use Helpdesk\Question as Question;
use Helpdesk\Answer as Answer;
use Helpdesk\Tag as Tag;
use Helpdesk\User as User;

use App;
use Session;
use DB;
use Log;
use Auth;

class IndexController extends Controller
{

	public function init(){
		App::setLocale(Session::get('locale'));
		$channel = new Channel();
		$question = new Question();
		$tag = new Tag();
		$user = new User();
		$answer = new Answer();

		$channels = $channel->getLatestChannel();
		$questions = $question->getQuestionByFavCount();
		$tags = $tag->getTagByCount();

		$channelC = $channel->getCount();
		$questionC = $question->getCount();
		$userC = $user->getCount();

		$unansweredQuestion = $question->getUnansweredQuestion();
		$popularAnswer = $answer->getPopularAnswer();

		return view('index', ['channels' => $channels, 'questions' => $questions, 'tags' => $tags, 'channelC' => $channelC, 'questionC' => $questionC, 'userC' => $userC, 'unAnswer' => $unansweredQuestion, 'popularAnswer' => $popularAnswer]);
	}

    public function searching(Request $r){
			$r->search = str_replace("'", "", $r->search);
    	$questionQuery = "SELECT * FROM question WHERE title LIKE '%".$r->search."%' OR body LIKE '%".$r->search."%' ORDER BY created_at DESC";

    	$answerQuery = "SELECT * FROM answer WHERE body LIKE '%".$r->search."%' ORDER BY created_at DESC";

    	$commentQuery = "SELECT * FROM comment WHERE body LIKE '%".$r->search."%' ORDER BY created_at DESC";

    	$channelQuery = "SELECT * FROM channel WHERE name LIKE '%".$r->search."%' OR description LIKE '%".$r->search."%' ORDER BY created_at DESC";

    	$userQuery = "SELECT * FROM users WHERE username LIKE '%".$r->search."%' OR email LIKE '%".$r->search."%' OR info LIKE '%".$r->search."%' ORDER BY created_at DESC";

    	$tagQuery = "SELECT * FROM tag WHERE name LIKE '%".$r->search."%' ORDER BY created_at DESC";

			$user = new User();
    	$question = DB::select($questionQuery);
			foreach($question as $q){
					$q->user = $user->getUserById($q->created_user);
			}
    	$answer = DB::select($answerQuery);
			foreach($answer as $a){
				$a->user = $user->getUserById($a->created_user);
			}
    	$comment = DB::select($commentQuery);
			foreach ($comment as $c) {
				$c->user = $user->getUserById($c->created_user);
			}
    	$channel = DB::select($channelQuery);
			foreach ($channel as $c){
				$c->user = $user->getUserById($c->created_user);
			}

			$q = new Question();
			$hotQuestions = $q->getHotQuestions();
			$popQuestions = $q->getQuestionByFavCount();

    	return view('index.searching', ['questions' => $question, 'answers' => $answer, 'comments' => $comment, 'channels' => $channel, 'hotQuestions' => $hotQuestions, 'popQuestions' => $popQuestions]);
    }

    public function latex(){
    	$body = "<tex>y=\sum_{i=0}^{10}x_i</tex>";
    	$latex = array();
        $firstIndex = 0;
        do{
            $firstIndex = strpos($body, "<tex>")+5;
            $lastIndex = strpos($body, "</tex>")-10;
            $length = $firstIndex+$lastIndex;
            $str = substr($body, $firstIndex, $length);
            array_push($latex, $str);
        } while($firstIndex < 0);

        echo $firstIndex;
        echo "<br>";
        echo $lastIndex;
        echo "<br>";

        $send = array('formula' => $latex[0], 'size' => '17px', 'fcolor' => '000000', 'mode' => 0, 'out' => 1, 'remhost' => 'quicklatex.com', 'preamble' => '\usepackage{amsmath}\usepackage{amsfonts}\usepackage{amssymb}', 'rnd' => '83.62466413313463');

       	//echo json_encode($send);
       	echo $send['formula'];

       	$options = array(
		    'http' => array(
		        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        'method'  => 'POST',
		        'content' => http_build_query($send)
		    )
		);
		$context  = stream_context_create($options);
		$result = file_get_contents('http://quicklatex.com/latex3.f', false, $context);
		//var_dump($result);
		$lastindex = strpos($result, '.png');
		$url = substr($result, 1, $lastindex+4);
		echo $url;

		echo "<img src='".$url."' />";
    }

    public function ajax(){
        return view('ajax');
    }

		public function getDataByUser($id){

		}


}
