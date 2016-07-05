<div class="col-md-10 col-md-offset-1 unAnswer">
    <div class="posts col-md-4">
      <span class="title col-md-12">{{ trans('homepage.unQuestion') }}</span>
      <div class="border"></div>

      @foreach($unAnswer as $question)
        <div class="col-md-12 repeat">
            <span></span>
            <span>
              <span><a href="/question-{{ $question->id }}">{{ $question->title }}</a></span>
              <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $question->favouriteCount }} <i class="fa fa-eye" aria-hidden="true"></i> {{ $question->viewCount }} <i class="fa fa-user" aria-hidden="true"></i> {{ $question->user->username }}</span>
            </span>
        </div>

      @endforeach
    </div>

    <div class="posts col-md-4">
      <span class="title col-md-12">{{ trans('homepage.pAnswer') }}</span>
      <div class="border"></div>
      @foreach($popularAnswer as $answer)
        <div class="col-md-12 repeat">
            <span></span>
            <span>
              <span><a href="/question-{{ $answer->question }}">{{ str_limit($answer->body, 30) }}...</a></span>
              <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $answer->favouriteCount }} <i class="fa fa-user" aria-hidden="true"></i> {{ $answer->user->username }}</span>
            </span>
        </div>
      @endforeach
    </div>

    <div class="posts col-md-4">
      <span class="title col-md-12">{{ trans('homepage.pAnswer') }}</span>
      <div class="border"></div>
      @foreach($popularAnswer as $answer)
        <div class="col-md-12 repeat">
            <span></span>
            <span>
              <span><a href="/question-{{ $answer->question }}">{{ str_limit($answer->body, 30) }}...</a></span>
              <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $answer->favouriteCount }} <i class="fa fa-user" aria-hidden="true"></i> {{ $answer->user->username }}</span>
            </span>
        </div>
      @endforeach
    </div>

</div>

<style>
.unAnswer {
  padding-top: 40px;
  padding-bottom: 40px;
}
.unAnswer .posts .title {
  padding-bottom: 10px;
  padding-left: 0px;
  font-size: 16px;
  font-weight: bold;
}
.unAnswer .repeat {
  padding-top: 5px;
  padding-bottom: 5px;
}
.unAnswer .repeat span {
  width: 100%;
  float: left;
}
.unAnswer .repeat span:last-child{
  text-align: left;
  font-size: 12px;
  color: #bdbdbd;
}
.unAnswer .repeat a:hover {
  color: #78909c !important;
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
.repeat {
  padding: 20px !important;
  background: #f4f4f4;
  margin-bottom: 2px;
  color: #5d5d5d !important;
  letter-spacing: 0.03em;
}
.repeat a {
  color: #5d5d5d !important;
}
.repeat>span:first-child:before{
  content: '\f105';
	font-family: 'FontAwesome';
	color: #141414;
	margin-right: 15px;
  height: 100%;
}
.repeat>span:first-child {
  width: 10%;
}
.repeat>span:last-child {
  width: 90%;
  float: left;
}
.repeat>span:last-child span:first-child {
  color: #5d5d5d !important;
}
.repeat>span:last-child span:last-child {
  color: #9f9f9f;
  margin-top: 5px;
}

.posts i {
  margin-right: 3px;
}
.fa-user, .fa-eye {
  margin-left: 20px;
}
</style>

<script>
	$(document).ready(function(){
			$('.posts').hover(
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
