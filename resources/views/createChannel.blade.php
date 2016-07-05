@include('header')
<style>
.title {
	padding-top: 20px;
	padding-bottom: 20px;
	border-bottom: 1px solid #12a802;
	float: left;
	width: 100%;
}
.form-control {
	margin-top: 10px;
	float: left;
}
.btn {
	margin-top: 10px;
}
.margin {
	margin-top: 10px !important;
}

.col-md-3 {
	margin-top: 60px;
	background: #efefef;
	text-align: justify;
}
.col-md-3 h5{
	line-height: 1.5 !important;
}
footer {
	margin-top: 40px;
}
</style>
<body class="container-fluid">
	<div class="header">
		@include('navbar')
		@include('smallsearch')
	</div>

	<div class="col-md-7 col-md-offset-1 createChannel">
		<span class="title">{{ trans('channel.createChannel') }}</span>
		{!! Form::open(array('url' => '/channel', 'method' => "post")) !!}

			{!! Form::text('name', null, ['class' => 'form-control margin', 'placeholder' => trans('channel.channelName'), 'required' => 'required']) !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('channel.description'), 'required' => 'required']) !!}
			{!! Form::select('published', array(1 => trans('channel.yes'), 0 => trans('channel.no')), 1, ['class' => 'form-control']) !!}
			{!! Form::submit(trans('channel.save'), ['class' => 'btn btn-success']) !!}

		{!! Form::close() !!}
	</div>

	<div class="col-md-3" style=>
		<h5>{{ trans('channel.info') }}</h5>
	</div>

	@include('footer')
</body>
