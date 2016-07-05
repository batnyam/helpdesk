@include('header')
<style>
	body {
		background: url(img/forest-bg.jpg);
		background-size: cover;
		background-position: bottom;
	}
</style>
<body class="container-fluid">

	<div class="col-md-12 login">
		<div class="col-md-3 col-md-offset-4">
			<h3>{{ trans('auth.login') }}</h3>
			{!! Form::open(array('url' => 'login', 'method' => 'POST')) !!}
				{!! csrf_field() !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('auth.email'), 'required' => 'required']) !!}
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('auth.password'), 'required' => 'required']) !!}
				{!! Form::submit(trans('auth.login'), ['class' => 'btn btn-success']) !!}
				<a href="signup"><input type="button" value="{{ trans('auth.signup') }}" class="btn btn-info"></a>
			{!! Form::close() !!}
		</div>
	</div>
</body>
