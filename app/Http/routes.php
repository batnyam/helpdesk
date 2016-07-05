<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'language'], function(){

	Route::get('/', 'IndexController@init');
	Route::get('/latex', 'IndexController@latex');
	Route::get('/search', 'IndexController@searching');

	Route::get('/language-{name}', function($name){
		Session::put('locale', $name);
		return redirect('/');
	});

	Route::get('/ask', function(){
		if(Auth::check()) return redirect()->action('QuestionController@showEditor');
			else return view('auth.login');
	});
	Route::get('/postC-{id}', 'QuestionController@channelPost');


	Route::get('/edit', 'QuestionController@showEditor');

	// Vote Routes
	Route::get('/question-{id}/voteUp-{count}', 'QuestionController@voteUp');
	Route::get('/question-{id}/voteDown-{count}', 'QuestionController@voteDown');

	// Comment Routes

	// Route for Auth
	Route::get('/logout', function(){
		Auth::logout();
	});
	Route::get('/signup', function(){
		Auth::logout();
		return view('auth.signup');
	});
	Route::post('/signup', 'UserController@signup');
	Route::get('/dashboard', 'DashboardController@init');
	// Route for Channel
	Route::get('/channel', function(){
		if (Auth::check()) return view('createChannel');
			else return view('auth.login');
	});

	Route::get('/channel-{id}', 'ChannelController@getChannel');
	Route::get('/channelInfos', 'ChannelController@getChannelInfo');

	// Route for Question
	Route::get('/question-{id}', 'QuestionController@getQuestion');
	Route::get('/tag-{name}', 'QuestionController@getQuestionByTagName');
	Route::get('/user-{id}', 'QuestionController@getQuestionByUser');
	Route::auth();

	// Route for auth users
	Route::group(['middleware' => 'auth'], function(){
		Route::post('/answer-{id}', 'AnswerController@newAnswer');
		Route::post('/channel', 'ChannelController@newChannel');
		Route::post('/question/comment', 'CommentController@newComment');
		Route::post('/post', 'QuestionController@post');
	});
});
