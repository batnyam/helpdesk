@include('header')
<style>
	body {
		background: url(img/forest-bg.jpg);
		background-size: cover;
		background-position: bottom;
	}
</style>
<body class="container-fluid">

	<div class="col-md-12 login signup">
		<div class="col-md-3 col-md-offset-4">
			<h3>{{ trans('auth.signup') }}</h3>
			{!! Form::open(array('url' => '/signup', 'method' => 'POST', 'files' => 'true')) !!}

				{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => trans('auth.username')]) !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('auth.email')]) !!}
				{!! Form::text('info', null, ['class' => 'form-control', 'placeholder' => trans('auth.info')]) !!}
				{!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('auth.password'))) !!}
				{!! Form::password('password1', array('class' => 'form-control', 'placeholder' => trans('auth.passwordre'))) !!}
				{!! Form::label(trans('auth.image')) !!}
				{!! Form::file('image', $attributes = array('class' => 'form-control')) !!}
				{!! Form::submit(trans('auth.save'), ['class' => 'btn btn-success']) !!}

			{!! Form::close() !!}

		</div>
	</div>
</body>
