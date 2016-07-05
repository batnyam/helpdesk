<?php

namespace Helpdesk\Http\Controllers;

use Illuminate\Http\Request;

use Helpdesk\Http\Requests;
use Helpdesk\Http\Controllers\Controller;

use Helpdesk\Channel as Channel;
use Helpdesk\User as User;
use Helpdesk\Question as Question;
use Auth;
use Validator;

class ChannelController extends Controller
{
    public function newChannel(Request $r){

        $validator = Validator::make($r->all(), [
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        if( $validator->fails())
        {
            redirect('/channel');
        }

    	$channel = new Channel();
    	$channel->name = $r->input('name');
    	$channel->description = $r->input('description');
    	$channel->published = $r->input('published');
    	$userId = Auth::id();
    	$channel->created_user = $userId;
    	$channel->updated_user = $userId;
    	$channel->Save();
        redirect('/channelInfos');
    }

    public function getChannel($id){
        $channel = new Channel();
        $info = $channel->getChannelInfo($id);
        $question = new Question();
        $questions = $question->getQuestionByChannel($id);

        $hotQuestions = $question->getHotQuestions();
        $popQuestions = $question->getQuestionByFavCount();

        return view('showChannel', ['info' => $info[0], 'questions' => $questions, 'hotQuestions' => $hotQuestions, 'popQuestions' => $popQuestions]);
    }

    public function getChannelInfo(){
        $user = Auth::user();
        $channel = new Channel();
        if($user)
        {
            $channelInfos = $channel->getAllChannelsByUser($user->id);
            return view('channelInfo', ['infos' => $channelInfos]);
        }
        return redirect('/ask');
    }
}
