@include('header')
<style>

</style>
<body class="container-fluid">
	<div class="header">
		@include('navbar')
		@include('smallsearch')
	</div>

	<div class="col-md-7 col-md-offset-1 tag">
		<span class="col-md-12 title">{{ trans('core.tTag') }}: {{ $tagName }}</span>
		<div class="border"></div>

		@foreach($questions as $question)
		<div class="col-md-12 question">
				<span></span>
				<div>
					<span><a href="/question-{{ $question->id }}">{{ $question->title }}</a></span>
					<span class="temp">{!! str_limit($question->body, 150) !!}...</span>
					<div class="icon">
							<span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $question->favouriteCount }} <i class="fa fa-eye" aria-hidden="true"></i> {{ $question->viewCount }} <i class="fa fa-user" aria-hidden="true"></i> <a class="active" href="/user-3">{{ $question->username }}</a></span>
					</div>
				</div>
		</div>
		@endforeach
	</div>

	<div class="col-md-3">
		@include('layouts.question_layout')
	</div>

	@include('footer')
	<style>
		body .tag {
			margin-top: 40px;
			margin-bottom: 40px;
		}
		body .col-md-3 {
			margin-top: 40px;
			margin-bottom: 40px;
		}
		.tag .title {
			font-size: 14px;
			font-weight: bold;
		}
		.border {
			float: left;
			width: 25%;
			height: 2px;
			background: #12a802;
			margin-bottom: 30px;
			margin-top: 8px;
		}
		.trans {
			transition:all 1s ease-in-out
			 -moz-transition:all 1s ease-in-out;
			 -webkit-transition:all 1s ease-in-out;
			 -o-transition:all 1s ease-in-out;
		}
		.question {
			border-bottom: 1px solid #12a802;
			padding-bottom: 20px;
			padding-top: 20px;
		}
		.question>span {
			width: 10%;
		}
		.question>span:first-child:before {
		    content: '\f105';
		    font-family: 'FontAwesome';
		    color: #12a802;
		    margin-right: 15px;
		    height: 100%;
		    float: left;
		}
		.question>div>span:first-child{
			float: left;
			font-size: 15px;
			font-weight: bold;
			margin-bottom: 10px;
		}
		.question .temp {
			float: left;
			padding-left: 20px;
			width: 100%;
		}
		.question>div>span:first-child a:hover{
			color: #12a802 !important;
		}
		.question .icon {
			float: left;
			padding-left: 20px;
			margin-top: 10px;
			color: #9f9f9f;
			width: 100%;
		}
		span i {
			margin-right: 5px;
			color: #9f9f9f;
		}
	</style>

	<script>
		$(document).ready(function(){
				$('.tag').hover(
					function(){
						$(this).children('.border').addClass('trans');
						$(this).children('.border').css('width', '100%');
					},
					function(){
						$(this).children('.border').addClass('trans');
						$(this).children('.border').css('width', '25%');
					})
		});
	</script>
</body>
