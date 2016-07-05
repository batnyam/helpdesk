@include('header')
<style>
.wrap {
	padding-top: 20px;
	padding-bottom: 20px;
}
.title {
	border-bottom: 1px solid #CACACA;
	padding-bottom: 10px;
}
.editor {
	padding: 20px 0 !important;
	font-family: 'Open Sans';
}
.markdown {
	font-family: 'Open Sans';
}
.editor .editing input[type="text"]{
	border-radius: 0;
	margin-bottom: 10px;
}
.editor .editBar .btn {
	border-radius: 0;
}
.editor .editBar .btn:hover {
	background: #000;
	color: #fff;
}
textarea[type="text"] {
	margin-top: 10px;
	float: left;
	resize: none;
	height: 300px !important;
	border-radius: 0;
}
textarea[type="tag"] {
	margin-top: 10px;
	float: left;
	border-radius: 0;
	resize: none;
	line-height: 16px;
	font-size: 16px;
	height: 26px !important;
	padding: 5px !important;
	overflow: hidden;
}
.editor .bottom {
	float: left;
	width: 100%;
	background-color: #cbd0d3;
	text-align: right;
	padding: 0 5px;
}

.editor .option {
	float: left;
	width: 100%;
	height: auto;
	margin-top: 10px;
}

.editor .editing>button {
	float: left;
	margin-top: 10px;
	margin-right: 10px;
}
ul li .btn {
	border-radius: 0 !important;
}

.btn-success {
	float: left !important;
	margin-right: 10px;
	margin-top: 10px;
}

.btn-info {
	float: left !important;
	margin-top: 10px;
}
</style>
	<script src="{{ asset('/bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.min.js') }}"></script>
	<script src="{{ asset('/editor/app.js') }}"></script>

<body class="container-fluid" ng-app="editor">
	<div class="header">
		@include('navbar')
	</div>

	<div class="col-md-10 col-md-offset-1 wrap">
		<span class="col-md-12 title">{{ trans('homepage.askaq') }}</span>

		<div class="col-md-12 editor" ng-controller="editing">
			<div class="col-md-6 editing">
				<form method="POST" action="/post">
					<input type="text" class="form-control" placeholder="{{ trans('core.title') }}" name="title"/>
					<div class="editbar">
						<ul>
							<li ng-click="clickBar(1)"><button class="btn" title="Paste"><i class="fa fa-clipboard"></i></button></li>
							<li ng-click="clickBar(2)"><button class="btn" title="Select All"><i class="fa fa-file-text"></i></button></li>
							<li ng-click="clickBar(3)"><button class="btn" title="Bold"><i class="fa fa-bold"></i></button></li>
							<li ng-click="clickBar(4)"><button class="btn" title="Italic"><i class="fa fa-italic"></i></button></li>
							<li ng-click="clickBar(5)"><button class="btn" title="Underline"><i class="fa fa-underline"></i></button></li>
							<li ng-click="clickBar(6)"><button class="btn" title="Numbered List"><i class="fa fa-list-ol"></i></button></li>
							<li ng-click="clickBar(7)"><button class="btn" title="Bullet List"><i class="fa fa-list-ul"></i></button></li>
							<li ng-click="clickBar(8)"><button class="btn" title="Code Quote"><i class="fa fa-code"></i></button></li>
							<li ng-click="clickBar(9)"><button class="btn" title="Center"><i class="fa fa-align-center"></i></button></li>
							<li ng-click="clickBar(10)"><button class="btn" title="Justify"><i class="fa fa-align-justify"></i></button></li>
							<li ng-click="clickBar(11)"><button class="btn" title="Left"><i class="fa fa-align-left"></i></button></li>
							<li ng-click="clickBar(12)"><button class="btn" title="Right"><i class="fa fa-align-right"></i></button></li>
							<li ng-click="clickBar(13)"><button class="btn" title="Link"><i class="fa fa-link"></i></button></li>
							<li ng-click="clickBar(14)"><button class="btn" title="Unlink"><i class="fa fa-chain-broken"></i></button></li>
							<li ng-click="clickBar(15)"><button class="btn" title="Image"><i class="fa fa-picture-o"></i></button></li>
						</ul>
					</div>

					<textarea ng-model="textarea" class="form-control" ng-change="typing()" ng-enter="pressEnter()" type="text" placeholder="{{ trans('core.question') }}" name="body"></textarea>
					<span class="bottom">$$ textarea.length $$</span>

					<input ng-model="tag" class="form-control" type="tag" placeholder="{{ trans('core.tag') }}" name="tag" data-role="tagsinput" ng-value="tag" />
					<input hidden value="{{ $id }}" name="channel" />

					@if($ranks != NULL)
					<div class="option">
						<select name="minRank">
							<option value="0">{{ trans('core.min') }}</option>
							@foreach($ranks as $rank)
								<option value="{{ $rank->id }}">{{ $rank->name }}</option>
							@endforeach
						</select>

						<select name="maxRank">
							<option value="0">{{ trans('core.max') }}</option>
							@foreach($ranks as $rank)
								<option value="{{ $rank->id }}">{{ $rank->name }}</option>
							@endforeach
						</select>
					</div>
					@endif

					<input name="_token" type="hidden" value={{ csrf_token() }}>
					<button class="btn btn-success" type="submit">{{ trans('core.submit') }}</button>
					<button class="btn btn-info" type="draft">{{ trans('core.draft') }}</button>

				</form>
			</div>

			<div class="col-md-6 markdown" ng-bind-html="textarea"></div>
		</div>
	</div>
</body>
