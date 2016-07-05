<div class="search">
	{!! Form::open(array('url' => '/search', 'method' => 'get')) !!}
		{!! Form::text('search', null, ['placeholder' => trans('homepage.search'), 'class' => 'col-md-6 col-md-offset-3']) !!}
	{!! Form::close() !!}

	<!--
	<button><a href="#" onclick="fb('description hongor meen')" target="_blank">Share</a></button>
	<button><a href="#" onclick="tw()" target="_blank">Share</a></button> -->
</div>
