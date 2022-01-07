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

					<input class="text" type="text" id="fullname" name="fullname" placeholder="Fullname" required="">
					<input class="text email" type="email" id="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" id="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" id="re_password" name="password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" id="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" id="registerButton" value="SIGNUP">

				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
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
            $('#registerButton').click(function(e){
                var email        = $("#email").val();
                var password     = $("#password").val();
                var  re_password = $("#re_password").val();
                var fullname     = $("#fullname").val();
                var checkbox     = $('#checkbox').val();
                var data = {
                    'email'    : email,
                    'password'    : password,
                    're_password'    : re_password,
                    'fullname'    : fullname,
                    'checkbox'    : checkbox,

            };
            $.ajax({
                    url : '/client/register',
                    type: 'post',
                    data: data,
                    success: function($xxx){
                        toastr.success('Đã tạo mới tài khoản thành công');
                        location.reload();
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
