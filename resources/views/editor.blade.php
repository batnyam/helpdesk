@include('header')
<style>
	body {
		background: #fff;
	}

	.editor {
		padding-top: 30px;
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
</style>
	<script src="{{ asset('/bower_components/angular/angular.min.js') }}"></script>
	<script src="{{ asset('/bower_components/angular-sanitize/angular-sanitize.min.js') }}"></script>
	<script src="{{ asset('/editor/app.js') }}"></script>
<body class="container-fluid" ng-app="editor">
	<div class="header">
		<div class="col-md-10 col-md-offset-1 wrap">
			<span class="logo"><i class="fa fa-quote-left"></i>Helpdesk</span>
			<nav>
				<a href="ask"><li>Ask a Question</li></a>
				<a href="#"><li>Create a Channel</li></a>
			</nav>
		</div>
	</div>

	<div class="col-md-12 editor" ng-controller="editing">
		<div class="col-md-6 editing">
			<input type="text" class="form-control" placeholder="Title here..."/>
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

			<textarea ng-model="textarea" class="form-control" ng-change="typing()" type="text" placeholder="Question here..."></textarea>
			<span class="bottom">$$ textarea.length $$</span>

			<textarea ng-model="tag" class="form-control" type="tag" placeholder="Tag here..."></textarea>

			<div class="option">
				<select>
					<option>Minimum Rank</option>
				</select>

				<select>
					<option>Maximum Rank</option>
				</select>
			</div>

			<button class="btn btn-success" type="submit">Submit</button>
			<button class="btn btn-info" type="draft">Draft</button>
		</div>

		<div class="col-md-6 markdown" ng-bind-html="textarea"></div>
	</div>

</body>
