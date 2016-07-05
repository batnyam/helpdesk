@include('header')
<style>

.tab-content span a {
	color: blue !important;
	text-decoration: underline !important;
}

.showChannelInfo .title {
	float: left;
	width: 100%;
	padding-top: 20px;
	padding-bottom: 20px;
	border-bottom: 1px solid #000;
}

.left {
	padding-top: 20px;
}
.right {
	padding-top: 20px;
	max-height: 400px;
	overflow-y: auto;
}
.tab-content {
	float: left;
	width: 100%;
}
.left ul li {
	width: 100%;
}
.left ul li a:hover {
	border-bottom: 0;
	border-radius: 4px;
}
.nav-tabs {
	border: none !important;
}
.left .active a{
	border: 1px solid #ddd !important;
	border-radius: 4px !important;
}

#questions span span, #answers span span, #comments span span {
	width: 100%;
	float: left;
}
</style>
<body class="container-fluid">
	<div class="header">
		@include('navbar')
		@include('smallsearch')
	</div>

	<div class="col-md-10 col-md-offset-1 showChannelInfo">
		<span class="title">Dashboard</span>

		<div class="left col-md-3">
			<ul class="nav nav-tabs" role="tablist">
				<li role="persentation"><a href="#info" role="tab" data-toggle="tab">Info</a></li>
				<li role="persentation"><a href="#channel" role="tab" data-toggle="tab">Channel</a></li>
				<li role="persentation"><a href="#questions" role="tab" data-toggle="tab">Questions</a></li>
				<li role="persentation"><a href="#answers" role="tab" data-toggle="tab">Answers</a></li>
				<li role="persentation"><a href="#comments" role="tab" data-toggle="tab">Comments</a></li>
			</ul>
		</div>

		<div class="right col-md-9">

			<!-- Channel Section -->
			<div class="tab-content">

				<div role="tabpanel" class="tab-pane fade in" id="info">
					hey it's info
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="channel">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						@foreach($channels as $channel)
						    <li role="presentation"><a href="#channel-{{ $channel->id }}" role="tab" data-toggle="tab">{{ $channel->name }}</a></li>
					    @endforeach 
					</ul>

					<div class="tab-content">
						@foreach($channels as $channel)
					  	<div role="tabpanel" class="tab-pane fade in" id="channel-{{ $channel->id }}">
					  		<span>Channel Name: {{ $channel->name }}</span>
					  		<span>Channel Description: {{ $channel->description }}</span>
					  		<span>Channel Link: <a href="/channel-{{ $channel->id }}">Click Here</a></span>
					  	</div>
					  	@endforeach
					</div>
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="questions">
					<span>
						@foreach($questions as $question)
							<span><a href="/question-{{ $question->id }}">{{ $question->title }}</a> - {{ $question->created_at->format('m/d H:i') }}</span>
						@endforeach
					</span>
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="answers">
					<span>
						@foreach($answers as $answer)
							<span><a href="/question-{{ $answer->question }}">{{ $answer->body }}</a> - {{ $answer->created_at->format('m/d H:i') }}</span>
						@endforeach
					</span>
				</div>

				<div role="tabpanel" class="tab-pane fade in" id="comments">
					<span>
						@foreach($comments as $comment)
							<span><a href="/question-{{ $comment->question }}">{{ $comment->body }}</a> - {{ $comment->created_at->format('m/d H:i') }}</span>
						@endforeach
					</span>
				</div>

			</div>

		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('.left ul li').first().addClass('active');
			$('.right .tab-content .tab-pane').first().addClass('active');
			/*
			$('.tab-content .tab-pane').first().addClass('active');
			$('.nav li').first().addClass('active');*/
		});
	</script>
</body>