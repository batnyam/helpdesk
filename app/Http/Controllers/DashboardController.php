<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;

use Auth;
use Helpdesk\Channel;
use Helpdesk\Question;
use Helpdesk\Answer;
use Helpdesk\Comment;
use Helpdesk\User;

class DashboardController extends Controller
{
    
    public function init(){

    	$user = new User();
        $channel = new Channel();
        $question = new Question();
        $answer = new Answer();
        $comment = new Comment();

        $user = Auth::user();

        $channelInfos = $channel->getAllChannelsByUser($user->id);
        $questions = $question->getQuestionByUser($user->id);
        $answers = $answer->getAnswersByUser($user->id);
        $comments = $comment->getCommentByUser($user->id);

    	return view('dashboard/show', ['channels' => $channelInfos, 'questions' => $questions, 'answers' => $answers, 'comments' => $comments]);
    }
}
