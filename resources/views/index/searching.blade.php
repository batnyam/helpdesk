@include('header')
<body class="container-fluid">
	<div class="header">
		@include('navbar')

		@include('smallsearch')
	</div>

	<div class="col-md-7 col-md-offset-1 search-result">
		<span class="bigTitle">{{ trans('core.squestion') }} - {{ count($questions) }}</span>

		@foreach($questions as $question )
		<span>
			<span class="box"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
			<div class="col-md-10">
				<span class="title"><a href="/question-{{ $question->id }}">{{ $question->title }}</a></span>
				<span class="body">{!! str_limit($question->body, 255) !!}...</span>
				<span class="bar-right">
					<span><a href="/user-{{ $question->user->id }}">{{ $question->user->username }}</a></span>
					<span>{{ $question->created_at }}</span>
				</span>
			</div>
		</span>
		@endforeach

		<span class="bigTitle">{{ trans('core.sanswer') }} - {{ count($answers) }}</span>
		@foreach($answers as $answer)
			<span>
				<span class="box"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<div class="col-md-10">
					<span class="body"><a href="/question-{{ $answer->question }}">{{ str_limit($answer->body, 250) }}...</a></span>
					<span class="bar-right">
						<span><a href="/user-{{ $question->user->id }}">{{ $answer->user->username }}</a></span>
						<span>{{ $answer->created_at }}</span>
					</span>
				</div>
			</span>
		@endforeach

		<span class="bigTitle">{{ trans('core.scomment') }} - {{ count($comments) }}</span>
		@foreach($comments as $comment)
			<span>
				<span class="box"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<div class="col-md-10">
					<span class="body"><a href="/question-{{ $comment->question }}">{{ str_limit($comment->body, 250) }}</a></span>
					<span class="bar-right">
						<span><a href="/user-{{ $question->user->id }}">{{ $comment->user->username }}</a></span>
						<span>{{ $comment->created_at }}</span>
					</span>
				</div>
			</span>
		@endforeach

		<span class="bigTitle">{{ trans('core.schannel') }} - {{ count($channels) }}</span>
		@foreach($channels as $channel)
			<span>
				<span class="box"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
				<div class="col-md-10">
					<span class="title"><a href="/channel-{{ $channel->id }}">{{ $channel->name }}</a></span>
					<span class="body">{{ str_limit($channel->description, 250) }}...</span>
					<span class="bar-right">
						<span><a href="/user-{{ $question->user->id }}">{{ $channel->user->username }}</span>
						<span>{{ $channel->created_at }}</span>
					</span>
				</div>
			</span>
		@endforeach
	</div>

	<div class="col-md-3">
		@include('layouts.question_layout')
	</div>
</body>

<style>
.title a, .body a {
	font-size: 15px;
}

.title a:hover, .body a:hover{
	text-decoration: none;
}

.search-result {
	padding-top: 20px;
	padding-bottom: 20px;
}

body>.col-md-3 {
	padding-top: 20px;
	padding-bottom: 20px;
}
.bar-right {
	margin-top: 10px;
}
.bar-right span:first-child a:hover{
	color: #12a802 !important;
}
.bar-right span:first-child:after{
	content: '|';
	margin-left: 10px;
	margin-right: 10px;
}
.box {
	float: left;
	color: #12a802;
}
.bigTitle {
	border-bottom: 1px solid #12a802;
	padding-bottom: 10px;
	font-size: 16px;
	width: 25%;
}
.trans {
	transition:all 1s ease-in-out
	 -moz-transition:all 1s ease-in-out;
	 -webkit-transition:all 1s ease-in-out;
	 -o-transition:all 1s ease-in-out;
}
</style>
<script>
	$(document).ready(function(){
			$('.search-result').hover(
				function(){
					$(this).children('.bigTitle').addClass('trans');
					$(this).children('.bigTitle').css('width', '100%');
				},
				function(){
					$(this).children('.bigTitle').addClass('trans');
					$(this).children('.bigTitle').css('width', '25%');
				})
	});
</script>
