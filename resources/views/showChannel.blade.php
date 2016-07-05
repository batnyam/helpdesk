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
	width: auto;
	color: #828282;
	padding-bottom: 10px;
	border-bottom: 1px solid #12a802;
}
.channel .questions {
	margin-top: 20px;
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
.channel .questions .question .left {
	float: left;
	width: 40%;
	margin-top: 5px;
}
.channel .questions .question .left span {
	padding: 3px 5px;
	background: #bdc3c7;
}
.channel .questions .question .right {
	float: left;
	width: 60%;
	text-align: right;
	margin-top: 8px;
}
body>.col-md-3 {
	padding-top: 20px;
	padding-bottom: 20px;
}
.questions>span {
	float: left;
	width: 100%;
}
.questions>span>span{
	padding: 0;
}
.questions .question {
	padding-bottom: 10px;
}
.questions .question i {
	margin-right: 10px;
	color: #12a802;
}
.questions .right span:first-child:after {
	content: '|';
	margin-left: 10px;
	margin-right: 10px;
}
.questions .right span a:hover {
	color: #12a802 !important;
}
.questions .left, .questions .right {
	margin-top: 10px !important;
}
.questions .left {
	padding-left: 15px;
}
span[role="button"]{
	float: right;
	padding: 5px 15px;
	background: #12a802;
	color: #fff;
}
</style>
<body class="container-fluid">
	<div class="header">
		@include('navbar')

		@include('smallsearch')
	</div>

	<div class="col-md-7 col-md-offset-1 channel">
		<span class="col-md-12 title">{{ $info->name }}</span>
		<span class="col-md-12 description">{{ $info->description }}</span>
		<a href="/postC-{{ $info->id }}"><span role="button">{{ trans('homepage.askaq') }}</span></a>

		<div class="col-md-12 questions">
			@foreach ( $questions as $question)
			<span>
				<span class="col-md-12 question">
					<span><i class="fa fa-angle-right" aria-hidden="true"></i><a href="question-{{ $question->id }}">{{ $question->title }}</a></span>
					<span class="left">
						@foreach ( $question->tags as $tag )
							<span><a href="tag-{{ $tag->name }}">{{ $tag->name }}</a></span>
						@endforeach
					</span>
					<span class="right">
						<span><a href="user-{{ $question->id }}">{{ $question->username }}</a></span>
						<span>{{ $question->created_at->format('m/d h:m') }}</span>
					</span>
				</span>
			</span>
			@endforeach
		</div>
	</div>

	<div class="col-md-3">
		@include('layouts.question_layout')
	</div>
	@include('footer')
</body>
