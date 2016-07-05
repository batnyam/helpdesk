<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>HelpDesk</title>

		<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/tagsinput.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/screen.css') }}">


		<script src="{{ asset('/bower_components/jquery/dist/jquery.js') }}"></script>
		<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/bower_components/materialize/dist/js/materialize.min.js') }}"></script>
		<script src="{{ asset('/js/tagsinput.min.js') }}"></script>

		<script>
			$(document).ready(function(){
				$('.header .search').height($(window).height() - $('.header .wrap').innerHeight());
				$('.header input').css('margin-top', ($(window).height()/2 - $('.header input').innerHeight()/2 - $('.header .wrap').innerHeight()));
				$('.header .small input').css('margin-top', ($('.header .search').height()/2 - $('.header input').innerHeight()/2));
			});
		</script>

		<script>
			window.fbAsyncInit = function() {
			    FB.init({
			      appId      : '1008323479243446',
			      xfbml      : true,
			      version    : 'v2.6'
			    });
			};

			(function(d, s, id){
			    var js, fjs = d.getElementsByTagName(s)[0];
			    if (d.getElementById(id)) {return;}
			    js = d.createElement(s); js.id = id;
			    js.src = "//connect.facebook.net/en_US/sdk.js";
			    fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

			var fb = function(description){

				var data = {
					method: 'feed',
					link: 'http://www.google.com',
					picture: 'http://s32.postimg.org/o4kel12hh/helpdesk_cover.gif',
					display: 'popup',
					name: 'HelpDesk',
					description: description,
					redirect_uri: ''
				};
				FB.ui(data, function(response){
				});
			}
		</script>
	</head>
