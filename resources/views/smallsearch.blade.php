<div class="search small">
	{!! Form::open(array('url' => '/search', 'method' => 'get')) !!}
		{!! Form::text('search', null, ['placeholder' => trans('homepage.search'), 'class' => 'col-md-8 col-md-offset-2']) !!}
	{!! Form::close() !!}
</div>
