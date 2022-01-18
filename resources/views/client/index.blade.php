@extends('client.master')
@section('content')
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        @foreach ($mainBanner as $value)
                        <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url({{$value->main_banner_1}})">
                            <div class="slider-progress"></div>
                            {{-- <div class="slider-content"> --}}
                                {{-- <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                <h2>Chamcham Galaxy S9 | S9+</h2>
                                <h3>Starting at <span>$1209.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div> --}}
                            {{-- </div> --}}
                        </div>
                        @endforeach
                        <!-- Single Slide Area End Here -->

                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                @foreach ( $subBanner as $value )
                <div class="li-banner">
                    <a href="#">
                        <img src="{{$value->small_banner_1}}" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                    <a href="#">
                        <img src="{{$value->small_banner_1}}" alt="">
                    </a>
                </div>
                @endforeach
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Product Area -->
<div class="product-area pt-60 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                       <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                       <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($newArrival as $value)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/client/detail/{{$value->slug}}-{{$value->id}}">
                                        <img src="{{$value->image_product}}" alt="Li's Product Image">
                                    </a>
                                    <span class="{{ $value->price_sell ? "sticker" : " " }}">
                                    @if(!empty($value->price_sell))
                                    <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                    @endif
                                    </span>
                                  </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @php
                                                        $star = rand(3, 5);
                                                    @endphp
                                                    @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/client/detail/{{$value->slug}}-{{$value->id}}">{{$value->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($value->price_root,0,',','.') . "đ"}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="li-bestseller-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($bestSeller as $value)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/client/detail/{{$value->slug}}-{{$value->id}}">
                                        <img src="{{$value->image_product}}" alt="Li's Product Image">
                                    </a>
                                    <span class="{{ $value->price_sell ? "sticker" : " " }}">
                                        @if(!empty($value->price_sell))
                                        <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                        @endif
                                    </span>
                                     </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @php
                                                        $star = rand(3, 5);
                                                    @endphp
                                                    @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/client/detail/{{$value->slug}}-{{$value->id}}">{{$value->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">{{number_format($value->price_root,0,',','.') . "đ"}}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Product Area End Here -->
<!-- Begin Li's Static Banner Area -->

<!-- Li's Static Banner Area End Here -->
<!-- Begin Li's Laptop Product Area -->
@foreach ($category as $value)


<section class="product-area li-laptop-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>{{$value->name}}</span>
                    </h2>

                </div>
                <div class="row">

                    <div class="product-active owl-carousel">
                        @foreach ($product as $value_pro )
                            @if($value_pro->category_id == $value->id)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->

                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/client/detail/{{$value_pro->slug}}-{{$value_pro->id}}">
                                        <img src="{{$value_pro->image_product}}" alt="Li's Product Image">
                                    </a>
                                    <span class="{{ $value_pro->price_sell ? "sticker" : " " }}">
                                    @if(!empty($value_pro->price_sell))
                                    <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value_pro->price_root - $value_pro->price_sell) / $value_pro->price_root * 100, 0) }}%</span>
                                    @endif
                                </span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="shop-left-sidebar.html">Graphic Corner</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @php
                                                        $star = rand(3, 5);
                                                    @endphp
                                                    @for ($x=1;$x<=$star;$x++)
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/client/detail/{{$value_pro->slug}}-{{$value_pro->id}}">{{$value_pro->name}}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price"></span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                            <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- single-product-wrap end -->
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>

@endforeach
<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->


<!-- Li's TV & Audio Product Area End Here -->
<!-- Begin Li's Static Home Area -->
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                @foreach ($subBanner as $value )
                <div class="li-static-home-image" style="background-image:url({{$value->sub_banner}}); width:1170px;"></div>
                @endforeach
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Meito Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Li's Trending Product Area -->
<section class="product-area li-trending-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Coming Soon</span>
                    </h2>

                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($comingsoon as $value )
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{$value->image_product}}" alt="Li's Product Image">
                                            </a>
                                            <span class="{{ $value->price_sell ? "sticker" : " " }}">
                                                @if(!empty($value->price_sell))
                                                <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                                @endif
                                            </span>
                                                                               </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            @php
                                                                $star = rand(3, 5);
                                                            @endphp
                                                            @for ($x=1;$x<=$star;$x++)
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">{{$value->name}}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($value->price_root,0,',','.') . "đ"}}</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>
<!-- Li's Trending Product Area End Here -->
<!-- Begin Li's Trendding Products Area -->
<section class="product-area li-trending-product pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Out of stock</span>
                    </h2>

                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($outofstock as $value )
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{$value->image_product}}" alt="Li's Product Image">
                                            </a>
                                            <span class="{{ $value->price_sell ? "sticker" : " " }}">
                                                @if(!empty($value->price_sell))
                                                <span style="text-align: text-nowrap" class="discount-percentage">-{{ number_format(($value->price_root - $value->price_sell) / $value->price_root * 100, 0) }}%</span>
                                                @endif
                                            </span>
                                                      </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            @php
                                                                $star = rand(3, 5);
                                                            @endphp
                                                            @for ($x=1;$x<=$star;$x++)
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">{{ $value_pro->name }}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($value->price_root,0,',','.') . "đ"}}</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>


@endsection
