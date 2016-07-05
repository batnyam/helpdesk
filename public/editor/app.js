var app = angular.module('editor', ['ngSanitize'])

.config(function($interpolateProvider){
	$interpolateProvider.startSymbol('$$');
	$interpolateProvider.endSymbol('$$');
})

.controller('editing', function($scope){
	$scope.textarea = "";

	$scope.paste = 0;
	$scope.italic = 0;
	$scope.code = 0;

	$scope.clickBar = function(id){
		$('textarea').focus();
		var a = document.activeElement;
		switch(id){
			case 1: {
				//paste
				/*a.selectionStart;
				$scope.textarea = $scope.textarea.slice(0, a.selectionStart);*/
				break;
			}
			case 2: {
				//select all
				$('textarea').select();
				break;
			}
			case 3: {
				//bold
				if ( a.selectionStart == a.selectionEnd )
				{
					if ( a.selectionStart == $scope.textarea.length ) {
						if ( $scope.bold % 2 != 0 && $scope.bold != 0 )
							$scope.textarea = $scope.textarea.concat("</b>");
						else $scope.textarea = $scope.textarea.concat("<b>");
					}
					else {
						alert("Select bish hoino bish gold ni bna");
						var str = $scope.textarea.substring(a.selectionStart, $scope.textarea.length);
						var str1 = $scope.textarea.substring(0, a.selectionStart);
						$scope.textarea = str1+"<b>"+str;
					}
				}
				else
				{
					var start = $scope.textarea.substring(0, a.selectionStart);
					var select = $scope.textarea.substring(a.selectionStart, a.selectionEnd);
					var end = $scope.textarea.substring(a.selectionEnd, $scope.textarea.length);
					$scope.textarea = start+"<b>"+select+"</b>"+end;
				}
				$scope.bold++;
				break;
			}
			case 4: {
				//italic
				if ( a.selectionStart == a.selectionEnd )
				{
					if ( a.selectionStart == $scope.textarea.length ) {
						if ( $scope.italic % 2 != 0 && $scope.italic != 0 )
							$scope.textarea = $scope.textarea.concat("</i>");
						else $scope.textarea = $scope.textarea.concat("<i>");
					}
					else {
						var str = $scope.textarea.substring(a.selectionStart, $scope.textarea.length);
						var str1 = $scope.textarea.substring(0, a.selectionStart);
						$scope.textarea = str1+"<i>"+str;
					}
				}
				else
				{
					var start = $scope.textarea.substring(0, a.selectionStart);
					var select = $scope.textarea.substring(a.selectionStart, a.selectionEnd);
					var end = $scope.textarea.substring(a.selectionEnd, $scope.textarea.length);
					$scope.textarea = start+"<i>"+select+"</i>"+end;
				}
				$scope.italic++;
				break;
			}
			case 5: {
				//underline
				if ( a.selectionStart == a.selectionEnd )
				{
					if ( a.selectionStart == $scope.textarea.length ) {
						if ( $scope.underline % 2 != 0 && $scope.underline != 0 )
							$scope.textarea = $scope.textarea.concat("</u>");
						else $scope.textarea = $scope.textarea.concat("<u>");
					}
					else {
						var str = $scope.textarea.substring(a.selectionStart, $scope.textarea.length);
						var str1 = $scope.textarea.substring(0, a.selectionStart);
						$scope.textarea = str1+"<u>"+str;
					}
				}
				else
				{
					var start = $scope.textarea.substring(0, a.selectionStart);
					var select = $scope.textarea.substring(a.selectionStart, a.selectionEnd);
					var end = $scope.textarea.substring(a.selectionEnd, $scope.textarea.length);
					$scope.textarea = start+"<u>"+select+"</u>"+end;
				}
				$scope.underline++;
				break;
			}
			case 8: {
				//code
				if ( a.selectionStart == a.selectionEnd )
				{
					if ( a.selectionStart == $scope.textarea.length ) {
						if ( ($scope.code % 2 != 0 ) && ($scope.code != 0 ))
							$scope.textarea = $scope.textarea.concat("</code></br>");
						else $scope.textarea = $scope.textarea.concat("<br><code>");
					}
					else {
						var str = $scope.textarea.substring(a.selectionStart, $scope.textarea.length);
						var str1 = $scope.textarea.substring(0, a.selectionStart);
						$scope.textarea = str1+"<br><code>"+str;
					}
				}
				else
				{
					var start = $scope.textarea.substring(0, a.selectionStart);
					var select = $scope.textarea.substring(a.selectionStart, a.selectionEnd);
					var end = $scope.textarea.substring(a.selectionEnd, $scope.textarea.length);
					$scope.textarea = start+"<br><code>"+select+"</code></br>"+end;
				}
				$scope.code++;
				break;
			}
		}
	};

	$scope.pressEnter = function(){
		$scope.textarea += "</br>";
	}
})

.controller('QuestionController', function($scope, $http){

	var url = 'http://localhost:8000/';
	$scope.isShow = false;

	$scope.voteUp = function(qId, vote){
		url1 = url + 'question-'+qId+'/voteUp-'+vote;
		if(!$scope.isShow) $scope.vote = vote + 1;
			else $scope.vote++;
		$scope.isShow = true;
		$http.get(url1).success(function(data){});
	}

	$scope.voteDown = function(qId, vote){
		url1 = url + 'question-'+qId+'/voteDown-'+vote;
		if(!$scope.isShow) $scope.vote = vote - 1;
			else $scope.vote--;
		$scope.isShow = true;
		$http.get(url1).success(function(data){});
	}

})

.controller('CommentController', function($scope, $http){
	var url = "http://localhost:8000/";
	$scope.comments = [];
	$scope.writeComment = false;
	$scope.postCommentQ = function(body, qId){
		url1 = url + 'question/comment';
		var data = {
			body: body,
			id: qId,
			aId: null
		};

		$http({
			method: 'POST',
			url: url1,
			data: data
		}).success(function(){
			var comment = {
				data: $scope.newComment
			};
			$scope.comments.push(comment);
			$scope.newComment = "";
		});
	}

	$scope.postCommentA = function(body, aId){
		url1 = url + 'question/comment';
		var data = {
			body: body,
			id: null,
			aId: aId
		};

		$http({
			method: 'POST',
			url: url1,
			data: data
		}).success(function(){
			var comment = {
				data: $scope.newComment
			};
			$scope.comments.push(comment);
			$scope.newComment = "";
		});
	}

	$scope.comment = function(){
		if( $scope.writeComment ) $scope.writeComment = false;
			else $scope.writeComment = true;
	}

})

.controller('LatexController', function($scope, $http){

	$scope.latex = function(){
		alert("bla");
		var url = "http://quicklatex.com/latex3.f";
		//var formula = "\begin{align*}x^2 + y^2 %26= 1 //\\y %26= //\sqrt{1 - x^2}//\end{align*}";
		/*var data = {
			formula: formula,
			fsize: "17px",
			fcolor: "000000",
			mode: "0",
			out: "1",
			remhost: "quicklatex.com",
			preamble: "//\usepackage{amsmath}//\usepackage{amsfonts}\usepackage{amssymb}",
			rnd: 6.594375852709633
		};*/
		$http({
			method: 'POST',
			url: url,
			data: data
		}).success(function(data){
			console.log(data);
		});
	}

})
.directive('ngEnter', function() {
    return function(scope, element, attrs) {
        element.bind("keydown keypress", function(event) {
            if(event.which === 13) {
                scope.$apply(function(){
                    scope.$eval(attrs.ngEnter, {'event': event});
                });

                event.preventDefault();
            }
        });
    };
});
