<div class="col-md-10 col-md-offset-1 wrap">
	<span class="logo"><a href="/"><i class="fa fa-quote-left"></i>{{ trans('homepage.helpdesk') }}</a></span>
	<nav>
		<a href="ask"><li>{{ trans('homepage.askaq') }}</li></a>
		<a href="channel" class="create"><li>{{ trans('homepage.creatac') }}</li></a>
		@if(Auth::check())
			<a href="dashboard"><li>{{ trans('homepage.dashboard') }}</li></a>
		@endif
	</nav>
</div>

<style>
.create {
	background: #12a802;
	padding: 0 14px;
	margin-left: 20px;
	float: left;
	border-bottom: 2px solid #0c8100;
}
.create li {
	margin-left: 0px !important;
}
</style>
