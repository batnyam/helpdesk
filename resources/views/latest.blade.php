<div class="col-md-10 col-md-offset-1 latest">
	<div class="col-md-4">
		<span>{{ trans('homepage.latestC') }}</span>
		<div class="border"></div>
		<ul>
			@foreach ( $channels as $channel )
				<li><a href="channel-{{ $channel->id }}">{{ $channel->name }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-md-4">
		<span>{{ trans('homepage.pQuestion') }}</span>
		<div class="border"></div>
		<ul>
			@foreach ( $questions as $question )
				<li><a href="question-{{ $question->id }}">{{ $question->title }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-md-4 tag">
		<span>{{ trans('homepage.pTag') }}</span>
		<div class="border"></div>
		<ul>
			@foreach ( $tags as $tag )
				<li><a href="tag-{{ $tag->name }}">{{ $tag->name }}</a></li>
			@endforeach
		</ul>
	</div>
</div>

<style>
.col-md-4>span{
	text-transform: uppercase;
	color: #062740;
}
.col-md-4 ul {
	width: 100%;
	float: left;
}
.col-md-4 ul li {
	padding-bottom: 18px !important;
}
.tag ul li {
		width: 50% !important;
}
.col-md-4 li a {
	color: #5d5d5d !important;
	text-transform: capitalize;
}
.col-md-4 li a:hover {
	color: #062740 !important;
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
</style>

<script>
	$(document).ready(function(){
			$('.latest .col-md-4').hover(
				function(){
					$(this).children('.border').addClass('trans');
					$(this).children('.border').css('width', '90%');

				},
				function(){
					$(this).children('.border').addClass('trans');
					$(this).children('.border').css('width', '25%');
				})
	});
</script>
