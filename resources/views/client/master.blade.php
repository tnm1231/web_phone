<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->
<head>
@include('client.head-css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
    <body>
@php
    $user = Auth::user();
@endphp
        <div class="body-wrapper">
            <!-- Begin Header Area -->
        @include('client.top')

            @yield('content')

           @include('client.footer')

            {{-- <div class="modal fade modal-wrapper" id="exampleModalCenter" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-inner-area row">
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                   <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-navigation-1">
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/1.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/2.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/3.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/4.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/5.jpg" alt="product image">
                                            </div>
                                            <div class="lg-image">
                                                <img src="/client/images/product/large-size/6.jpg" alt="product image">
                                            </div>
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1">
                                            <div class="sm-image"><img src="/client/images/product/small-size/1.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="/client/images/product/small-size/2.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="/client/images/product/small-size/3.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="/client/images/product/small-size/4.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="/client/images/product/small-size/5.jpg" alt="product image thumb"></div>
                                            <div class="sm-image"><img src="/client/images/product/small-size/6.jpg" alt="product image thumb"></div>
                                        </div>
                                    </div>
                                    <!--// Product Details Left -->
                                </div>

                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content pt-60">
                                        <div class="product-info">
                                            <h2>Today is a good day Framed poster</h2>
                                            <span class="product-details-ref">Reference: demo_15</span>
                                            <div class="rating-box pt-20">
                                                <ul class="rating rating-with-review-item">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="review-item"><a href="#">Read Review</a></li>
                                                    <li class="review-item"><a href="#">Write Review</a></li>
                                                </ul>
                                            </div>
                                            <div class="price-box pt-20">
                                                <span class="new-price new-price-2">$57.98</span>
                                            </div>
                                            <div class="product-desc">
                                                <p>
                                                    <span>100% cotton double printed dress. Black and white striped top and orange high waisted skater skirt bottom. Lorem ipsum dolor sit amet, consectetur adipisicing elit. quibusdam corporis, earum facilis et nostrum dolorum accusamus similique eveniet quia pariatur.
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="product-variants">
                                                <div class="produt-variants-size">
                                                    <label>Dimension</label>
                                                    <select class="nice-select">
                                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                                        <option value="2" title="M">60x90cm</option>
                                                        <option value="3" title="L">80x120cm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity">
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <div class="cart-plus-minus">
                                                            <input class="cart-plus-minus-box" value="1" type="text">
                                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                                </form>
                                            </div>
                                            <div class="product-additional-info pt-25">
                                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                                <div class="product-social-sharing pt-25">
                                                    <ul>
                                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="modal fade modal-wrapper" id="loginModal" >
                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                    <div class="modal-content" style="width:18cm" >
                        <div class="modal-body">
                            <h3 class="review-page-title">Login</h3>
                            <div class="page-section mb-60">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <!-- Login Form s-->
                                            <form action="#">
                                                <div class="login-form">
                                                    <h4 class="login-title">Login</h4>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12 mb-20">
                                                            <label>Email Address*</label>
                                                            <input class="mb-0" type="email"  id="email_login" placeholder="Email Address">
                                                        </div>
                                                        <div class="col-12 mb-20">
                                                            <label>Password</label>
                                                            <input class="mb-0" type="password"  id="password_login" placeholder="Password">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                                <input type="checkbox" id="remember_me">
                                                                <label for="remember_me">Remember me</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                                            <a data-toggle="modal" data-target="#registerModal" > Forgot password?</a>
                                                        </div>
                                                        <div class="col-md-12 mb-20">
                                                            <button  id="loginButton" class="register-button mt-0">Login</button>
                                                        </div>

                                                        <a data-toggle="modal" data-target="#registerModal" > Don't have account? Register here</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-wrapper" id="registerModal" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="review-page-title">Login/Register</h3>
                            <div class="page-section mb-60">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <form action="#">
                                                <div class="login-form">
                                                    <h4 class="login-title">Register</h4>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12 mb-20">
                                                            <label>FullName</label>
                                                            <input class="mb-0" id="fullname"  type="text" placeholder="Last Name">
                                                        </div>
                                                        <div class="col-md-12 mb-20">
                                                            <label>Email Address*</label>
                                                            <input class="mb-0" id="email_register" type="email" placeholder="Email Address">
                                                        </div>
                                                        <div class="col-md-6 mb-20">
                                                            <label>Password</label>
                                                            <input class="mb-0"  id="password_register" type="password" placeholder="Password">
                                                        </div>
                                                        <div class="col-md-6 mb-20">
                                                            <label>Confirm Password</label>
                                                            <input class="mb-0" id="re_password_register" type="password"  placeholder="Confirm Password">
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="register-button mt-0" id="registerButton">Register</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-wrapper" id="forgetModal" >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="review-page-title">Login/Register</h3>
                            <div class="page-section mb-60">
                                <div class="container">
                                    <div class="row">

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <form action="#">
                                                <div class="login-form">
                                                    <h4 class="login-title">Register</h4>
                                                    <div class="row">


                                                        <div class="col-md-12 mb-20">
                                                            <label>Email Address*</label>
                                                            <input class="mb-0" id="email_forget" type="email" placeholder="Email Address">
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @include('client.foot-css')
       @yield('js')
       <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    </body>

<!-- index30:23-->
</html>

