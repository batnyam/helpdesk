<div class="sidebar posts">
  <span class="sidebar_title">{{ trans('core.hotQ') }}</span>
  <div class="border"></div>

  @foreach($hotQuestions as $hotQuestion)
    <div class="col-md-12 repeat">
      <span></span>
      <span>
        <span><a href="/question-{{ $hotQuestion->id }}" class="active">{{ $hotQuestion->title }}</a></span>
        <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $hotQuestion->favouriteCount }} <i class="fa fa-eye" aria-hidden="true"></i> {{ $hotQuestion->viewCount }} <i class="fa fa-user" aria-hidden="true"></i> <a class="active" href="/user-{{ $hotQuestion->created_user }}">{{ $hotQuestion->user->username }}</a></span>
      </span>
    </div>
  @endforeach
</div>

<div class="sidebar posts" style="margin-top: 40px; float: left">
  <span class="sidebar_title">{{ trans('core.popQ') }}</span>
  <div class="border"></div>

  @foreach($popQuestions as $hotQuestion)
    <div class="col-md-12 repeat">
      <span></span>
      <span>
        <span><a href="/question-{{ $hotQuestion->id }}" class="active">{{ $hotQuestion->title }}</a></span>
        <span><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{ $hotQuestion->favouriteCount }} <i class="fa fa-eye" aria-hidden="true"></i> {{ $hotQuestion->viewCount }} <i class="fa fa-user" aria-hidden="true"></i> <a class="active" href="/user-{{ $hotQuestion->created_user }}">{{ $hotQuestion->user->username }}</a></span>
      </span>
    </div>
  @endforeach
</div>

<style>

.sidebar_title {
  float: left;
  width: 100%;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 14px;
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
.repeat .active:hover {
  color: #12a802 !important;
}
.repeat>span:first-child:before{
  content: '\f105';
	font-family: 'FontAwesome';
	color: #141414;
	margin-right: 15px;
  height: 100%;
  float: left;
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
  width: 100%;
  float: left;
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
