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
		<h1>Enter your new password</h1>
        <form action="{{Route('changePass')}}" method="post">
            @csrf
            {{-- @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
            @endif --}}
		<div class="main-agileinfo">
			<div class="agileits-top">
                    <input class="text" type="email" name="email" placeholder="Enter Email" required="" >
                @if($errors->has('email'))
                <span class="error-text">
                    {{$errors->first('email')}}
                </span>
                @endif
                    <br>
                    <input class="text" type="password" name="password" placeholder="Enter Old Password" required="">
                        @if($errors->has('password'))
                            <span class="error-text">
                                {{$errors->first('password')}}
                            </span>
                        @endif
                        <br>
					<input class="text" type="password" name="newPass" placeholder="Enter New Password" required="">
                        @if($errors->has('newPass'))
                            <span class="error-text">
                                {{$errors->first('newPass')}}
                            </span>
                        @endif
                        <br>
                    <input class="text" type="password" name="rePass" placeholder="Re-Password" required="">
                        @if($errors->has('rePass'))
                            <span class="error-text">
                                {{$errors->first('rePass')}}
                            </span>
                        @endif
                        <br>
					<div class="wthree-text">

						<div class="clear"> </div>
					</div>
					<input type="submit"  value="Change">

			</div>
		</div>
		<!-- copyright -->
    </form>
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
</html>
