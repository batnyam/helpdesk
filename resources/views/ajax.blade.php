@include('header')
<head>
 <meta name="_token" content="<?php echo csrf_token() ?>"/>
</head>
<body>
<button onclick="ajax()">Send</button>
<script>
	var ajax = function(){
		var body = "Hello it's ajax post";
		var question = 3;
		var created_user = 3;
		var data = 'body='+body+'&'+'question='+question+'&'+'created_user='+created_user;

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

		$.ajax({
			type: "POST",
			url: 'http://localhost:8000/answer',
			data: data,
			success: function(data){
				console.log(data);
			}
		});
	}
</script>
</body>