@include('header')
<style>
.channel {
	padding-top: 20px;
	padding-bottom: 20px;
}
.channel>span:first-child {
	font-size: 15px;
}
.channel .description {
	font-size: 12px;
	color: #828282;
	padding-bottom: 10px;
	border-bottom: 1px solid #a1a1a1;
}
.channel .questions {
	margin-top: 20px;
}
.channel .questions>span{
	float: left;
	width: 100%;
}
.channel .title {
	border-bottom: 1px solid #cacaca;
	padding-bottom: 10px;
}
.channel .questions .blocks>span {
	text-align: center;
	font-size: 12px;
}
.channel .questions .blocks>span span {
	width: 100%;
	float: left;
}
.channel .questions .question>span:first-child {
	width: 100%;
	float: left;
}
.channel .questions .question .left span {
	padding: 3px 5px;
	width: 100%;
	float: left;
}
.channel .questions .question .left span:first-child {
	text-align: justify;
}
.channel .questions .question .right span{
	width: 100%;
	float: left;
}
.blocks>span {
	padding: 0 !important;
}
.functions span {
	width: auto !important;
	float: right !important;
}
.newComment {
	width: 100%;
	float: left;
}
.newComment input {
	display: block;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.comments {
	font-size: 12px;
	color: #979797;
	float: left;
}
.comments span {
	float: left;
	width: 100%;
	padding: 5px 0;
	border-top: 1px solid #f1f1f1;
	color: #333;
}
.answer {
	padding-top: 30px;
	width: 100%;
	float: left;
}
.question-block {
	padding-top: 30px;
	padding-bottom: 30px;
}
.right-block {
	padding-top: 30px;
	padding-bottom: 30px;
}
.question-block .title {
	text-transform: capitalize;
	padding-bottom: 15px;
	border-bottom: 1px solid #ececec;
	font-size: 20px;
}
.question-block .questions {
	padding-top: 20px;
	padding-bottom: 20px;
	border-bottom: 1px solid #ececec;
}
.question-block .questions:first-child {
	border: 0 !important;
}
.question-block .questions .blocks .full{
	text-align: center;
	width: 100%;
	float: left;
	color: #a4a4a4;
	font-size: 16px;
}
.question-block .questions .blocks i{
	width: 100%;
	float: left;
	text-align: center;
	color: #d1d1d1;
}
.question-block .questions .blocks i:hover {
	color: #12a802;
}
.question .left .body {
	width: 100%;
	float: left;
	letter-spacing: 0.02em;
	font-size: 15px;
}
.questions .question {
	padding: 0 !important;
}
.questions .question a {
	color: #12a802;
}
.questions .info {
	padding-top: 20px;
	padding-bottom: 20px;
}
.questions .info .pull-left a:hover {
	color: #12a802;
}
.questions .info .pull-left span {
	margin-right: 20px;
}
.questions .info .pull-left span:last-child {
	color: #d1d1d1;
	font-size: 12px;
}
.questions .info .pull-left span:first-child:after {
	content: '|';
	margin-left: 20px;
}
.question .body {
	line-height: 1.8;
}
.questions .info .tag {
	background: #e3e3e3;
	padding: 5px 20px;
	width: auto;
	height: auto;
	float: left;
	color: #6b6b6b;
	margin-left: 10px;
}
.questions .info .tag:hover {
	background: #12a802;
	color: #fff;
}
.functions {
	margin-top: 10px;
	float: right;
}
.functions span {
	margin-left: 10px;
}
.pull-full {
	width: 100%;
	float: left;
}
.comment-input {
	padding: 0 !important;
}
.comment-input input {
	outline: none;
}
.comment-input button {
	float: right;
	border: 0;
	background: #e3e3e3;
	color: #6b6b6b;
}
.comment-input button:hover {
	background: #12a802;
	color: #fff;
}
.editbar ul li .btn{
	border-radius: 0;
}
.editing {
	padding: 0 !important;
}

.editor textarea {
	margin-top: 20px;
	float: left;
	border-radius: 0;
}
.editor textarea[type="text"]{
	height: 200px;
}
.editing .bottom {
	float: left;
	width: 100%;
	background-color: #cbd0d3;
  text-align: right;
  padding: 0 5px;
}
.editing .btn-success {
	float: left;
	border-radius: 0;
	margin-top: 20px;
}
</style>
	<script src="{{ asset('/bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.min.js') }}"></script>
	<script src="{{ asset('/editor/app.js') }}"></script>
<body class="container-fluid" ng-app="editor">
	<div class="header">
		@include('navbar')
		@include('smallsearch')
	</div>

	<div class="col-md-7 col-md-offset-1 question-block">
		<span class="col-md-12 title">{{ $question->title }}</span>

		<div class="col-md-12 questions" ng-controller="QuestionController" style="border-bottom: 0 !important">
			<span>
				<span class="blocks col-md-1">
					<span class="col-md-12">
						<span role="button"><i class="fa fa-sort-asc fa-3x" aria-hidden="true" ng-click="voteUp({{ $question->id }}, {{ $question->favouriteCount }})"></i></span>
						<span ng-show="!isShow" class="full">{{ $question->favouriteCount }}</span>
						<span ng-show="isShow" class="full">$$ vote $$</span>
						<span role="button"><i class="fa fa-sort-desc fa-3x" aria-hidden="true" ng-click="voteDown({{ $question->id }}, {{ $question->favouriteCount }})"></i></span>
					</span>
				</span>

				<span class="col-md-11 question">
						<span class="body">{!! $question->body !!}</span>
				</span>

				<span class="col-md-12 info">
						<span class="pull-left">
							<span><img src=""><a href="/user-{{ $question->created_user }}">{{ $question->username }}</a></span>
							<span>{{ $question->created_at->format('m/d H:i') }}</span>
						</span>

						<span class="pull-right">
							@foreach($question->tags as $tag)
								<span class="tag"><a href="/tag-{{ $tag->name }}">{{ $tag->name }}</a></span>
							@endforeach
						</span>
				</span>
			</span>

			<span ng-controller="CommentController" class="pull-full">
				<span class="comments col-md-offset-1">
					@foreach($question->comments as $comment)
						<span>{{ $comment->body }}. - <a href="/user-{{ $comment->created_user->id }}">{{ $comment->created_user->username }}</a> - {{ $comment->created_at->format('m/d H:i') }}</span>
					@endforeach
				</span>

				<span class="comments col-md-offset-1">
					<span ng-repeat="comment in comments">$$ comment.data $$ - You Just Now</span>
				</span>

				<span class="col-md-11 col-md-offset-1 comment-input" ng-show="writeComment">
						<input ng-model="newComment" type="text" class="col-md-10"></input>
						<button class="col-md-2" ng-click="postCommentQ(newComment, {{ $question->id }})">{{ trans('core.add') }}</button>
				</span>

				<span class="functions">
					<span ng-click="comment()" role="button">{{ trans('core.comment') }}</span>
					<span ng-click="edit">{{ trans('core.edit') }}</span>
				</span>

			</span>
		</div>


		<span class="title col-md-12">{{ trans('core.answers') }}</span>

		@foreach($answers as $answer)
		<div class="col-md-12 questions" ng-controller="QuestionController">
			<span>
				<span class="blocks col-md-1">
					<span class="col-md-12">
						<span role="button"><i class="fa fa-sort-asc fa-3x" aria-hidden="true" ng-click="voteUp({{ $answer->id }}, {{ $answer->favouriteCount }})"></i></span>
						<span ng-show="!isShow" class="full">{{ $answer->favouriteCount }}</span>
						<span ng-show="isShow" class="full">$$ vote $$</span>
						<span role="button"><i class="fa fa-sort-desc fa-3x" aria-hidden="true" ng-click="voteDown({{ $answer->id }}, {{ $answer->favouriteCount }})"></i></span>
					</span>
				</span>

				<span class="col-md-11 question">
						<span class="body">{!! $answer->body !!}</span>
				</span>

				<span class="col-md-12 info">
						<span class="pull-left">
							<span><img src=""><a href="/user-{{ $answer->created_user }}">{{ $answer->user->username }}</a></span>
							<span>{{ $answer->created_at->format('m/d H:i') }}</span>
						</span>
				</span>
			</span>

			<span ng-controller="CommentController" class="pull-full">
				<span class="comments col-md-offset-1">
					@foreach($answer->comments as $comment)
						<span>{{ $comment->body }}. - <a href="/user-{{ $comment->user->id }}">{{ $comment->user->username }}</a> - {{ $comment->created_at->format('m/d H:i') }}</span>
					@endforeach
				</span>

				<span class="comments col-md-offset-1">
					<span ng-repeat="comment in comments">$$ comment.data $$ - You Just Now</span>
				</span>

				<span class="col-md-11 col-md-offset-1 comment-input" ng-show="writeComment">
						<input ng-model="newComment" type="text" class="col-md-10"></input>
						<button class="col-md-2" ng-click="postCommentA(newComment, {{ $answer->id }})">{{ trans('core.add') }}</button>
				</span>

				<span class="functions">
					<span ng-click="comment()" role="button">{{ trans('core.comment') }}</span>
					<span ng-click="edit">{{ trans('core.edit') }}</span>
				</span>

			</span>
		</div>
		@endforeach

		<div class="answer">
			<div class="col-md-12 editor" ng-controller="editing">
				<div class="col-md-12 editing">
					<form method="POST" action="/answer-{{ $question->id }}">
						<div class="editbar">
							<ul>
								<li ng-click="clickBar(1)"><button class="btn" title="Paste"><i class="fa fa-clipboard"></i></button></li>
								<li ng-click="clickBar(2)"><button class="btn" title="Select All"><i class="fa fa-file-text"></i></button></li>
								<li ng-click="clickBar(3)"><button class="btn" title="Bold"><i class="fa fa-bold"></i></button></li>
								<li ng-click="clickBar(4)"><button class="btn" title="Italic"><i class="fa fa-italic"></i></button></li>
								<li ng-click="clickBar(5)"><button class="btn" title="Underline"><i class="fa fa-underline"></i></button></li>
								<li ng-click="clickBar(6)"><button class="btn" title="Numbered List"><i class="fa fa-list-ol"></i></button></li>
								<li ng-click="clickBar(7)"><button class="btn" title="Bullet List"><i class="fa fa-list-ul"></i></button></li>
								<li ng-click="clickBar(8)"><button class="btn" title="Code Quote"><i class="fa fa-code"></i></button></li>
								<li ng-click="clickBar(9)"><button class="btn" title="Center"><i class="fa fa-align-center"></i></button></li>
								<li ng-click="clickBar(10)"><button class="btn" title="Justify"><i class="fa fa-align-justify"></i></button></li>
								<li ng-click="clickBar(11)"><button class="btn" title="Left"><i class="fa fa-align-left"></i></button></li>
								<li ng-click="clickBar(12)"><button class="btn" title="Right"><i class="fa fa-align-right"></i></button></li>
								<li ng-click="clickBar(13)"><button class="btn" title="Link"><i class="fa fa-link"></i></button></li>
								<li ng-click="clickBar(14)"><button class="btn" title="Unlink"><i class="fa fa-chain-broken"></i></button></li>
								<li ng-click="clickBar(15)"><button class="btn" title="Image"><i class="fa fa-picture-o"></i></button></li>
							</ul>
						</div>

						<textarea ng-model="textarea" class="form-control" ng-change="typing()" ng-enter="pressEnter()" type="text" placeholder="{{ trans('core.answer') }}" name="body"></textarea>
						<span class="bottom">$$ textarea.length $$</span>

						<input name="_token" type="hidden" value={{ csrf_token() }}>
						<button class="btn btn-success" type="submit">{{ trans('core.submit') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 right-block">
		@include('layouts.question_layout')
	</div>

	@include('footer')
</body>
