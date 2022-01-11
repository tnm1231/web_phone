<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="/user/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@toastr_css
<!-- //web font -->
</head>

<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>

		<div class="main-agileinfo">
			<div class="agileits-top">

					<input class="text email" type="email" id="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" id="password" name="password" placeholder="Password" required="">
					<div class="wthree-text">

						<div class="clear"> </div>
					</div>
					<input type="submit" id="loginButton" value="SIGNUP">

				<a href="/forget"> Forgot password?</a>
			</div>
		</div>
		<!-- copyright -->

		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
@jquery
@toastr_js
@toastr_render
	<!-- //main -->
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    <script>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				toastr.error("{{$error}}");
			@endforeach
			@endif
	</script>
    <script>
        $(document).ready(function(){
            $('#loginButton').click(function(e){
                var email        = $("#email").val();
                var password     = $("#password").val();

                var data = {
                    'email'    : email,
                    'password'    : password,

            };
            $.ajax({
                    url : '/login',
                    type: 'post',
                    data: data,
                    success: function($data){
                        if($data.status == 0){
                            toastr.error($data.message);
                        } else if($data.status == 1) {
                            toastr.warning($data.message);
                        } else {
                            toastr.success($data.message);
                        }
                    },
                    error: function($errors){
                        var listErrors = $errors.responseJSON.errors;
                        $.each(listErrors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
</html>
