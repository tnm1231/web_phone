@extends('client.master')
@section('content')
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row">
                                    <input value="Login" type="submit">
                                    <label>
                                        <input type="checkbox">
                                         Remember me
                                    </label>
                                </p>
                                <p class="lost-password"><a href="#">Lost your password?</a></p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                    <!--Accordion Start-->
                    <h3>Add address? <span id="showaddress">List address</span></h3>
                    <div id="checkout-address" class="coupon-content">
                        <div class="coupon-info">
                            @php
                            $user = Auth::user();
                        @endphp
                          @if(isset($user))
                        <div class="col-md-12">
                            @foreach ($address as $value )
                            <div class="checkout-form-list create-acc">
                                <input id="tickaddress" type="checkbox">
                                <label>{{$value->fullname}}, {{$value->phone}}, {{$value->detailAdd}}, {{$value->precinct}}, {{$value->district}}, {{$value->city}}</label>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <button class="btn btn-warning mb-4 ml-4" id="address" data-toggle="modal" data-target="#addAddress">Add Address</button>
                        </div>
                    </div>
                    <!--Accordion End-->
                    <!--Accordion Start-->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text">
                                    <input value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>

        <div class="row">

            @php
            $thanhTien = 0;
            $tongSanPham = 0;
            $thanhTien_root = 0;
            $discount = 0;
            $giaSP = 0;
            @endphp
            @if(isset($cart))
            @foreach ($cart as $value )
                @php
                    $donGia = empty($value->product->price_sell)? $value->product->price_root : $value->product->price_sell;
                    $soLuong = $value->qty;
                    $gia_root = $value->product->price_root;
                    $giaSP = $gia_root*$soLuong;
                    $thanhTien_root = $thanhTien_root + $gia_root* $soLuong;
                    $thanhTien = $thanhTien + $donGia * $soLuong;
                    $tongSanPham += $value->qty;
                   $discount =  $thanhTien_root - $thanhTien;
                @endphp
            @endforeach
            @endif
            @if(isset($cart))
            <div class="col-lg-12 col-12">

                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name" >Product</th>
                                    <th class="cart-product-total" style="width:35%">Total</th>
                                    <th class="cart-product-name" >Image</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $user = Auth::user();
                                @endphp
                                @if(isset($user))
                                @foreach ($cart as $value )
                                <tr class="cart_item">
                                  <td style="font-size:16px" class="cart-product-name">{{$value->product->name}}<strong class="product-quantity"> × {{$value->qty}}</strong></td>
                                  <td style="font-size:16px" class="cart-product-total"><span class="amount">{{number_format($value->product->price_root*$value->qty,0,'.',',')}}</span></td>
                                  <td class="cart-product-name"><img src="{{$value->product->image_product}}" style="width:100px;height:100px" alt=""></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td style="text-align:center; display:block"><span class="amount">{{number_format($thanhTien_root,0,'.',',')}}</span></td>
                                </tr>
                                <tr class="cart-subtotal text-center">
                                    <th>Discount</th>
                                    <td><span class="amount">-{{number_format($discount,0,'.',',')}}</span></td>
                                </tr>
                                <tr class="order-total text-center">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">{{number_format($thanhTien,0,'.',',')}}</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="#payment-1">
                                  <h5 class="panel-title">
                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Direct Bank Transfer.
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="#payment-2">
                                  <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Cheque Payment
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="#payment-3">
                                  <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      PayPal
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                  <div class="card-body">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="order-button-payment">
                                <input value="Place order" type="submit">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
    </div>
</div>
<div class="modal fade modal-wrapper" id="addAddress" >
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content" style="width:18cm" >
            <div class="modal-body">
                <h3 class="review-page-title">Login</h3>
                <div class="page-section mb-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <form action="#">
                                    <div class="checkbox-form">
                                        <h3>Billing Details</h3>
                                        <div class="row">
                                            @php
                                                $user = Auth::user();
                                            @endphp
                                            <input type="hidden" value="{{$user->id}}" id="user_id">
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Họ và Tên <span class="required">*</span></label>
                                                    <input id="fullname" placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Phone  <span class="required">*</span></label>
                                                    <input id ="phone" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @foreach ($province as $value_pro)
                                                <select name="" id="">
                                                    <option data-code=null value="null">Tỉnh / Thành</option>

                                                    <option data-code="{{$value_pro->_code}}" value="{{$value_pro->id}}">{{$value_pro->_name}}</option>

                                                </select>
                                            </div>

                                            @foreach ($district as $value_dis)
                                            @if ($value_pro->id ==$value_dis->_province_id)
                                            <div class="col-md-6">
                                                <select name="" id="">
                                                    <option data-code=null value="null">Quận / Huyện</option>
                                                    <option data-code="{{$value_dis->_prefix}}" value="{{$value_dis->id}}">{{$value_dis->_name}}</option>
                                                </select>
                                            </div>
                                            @endif
                                            @foreach ($ward as $value_wa)
                                            @if ($value_dis->id == $value_wa->_district_id )

                                            <div class="col-md-6">
                                                <select name="" id="">
                                                    <option data-code=null value="null">Phường / Xã</option>
                                                    <option data-code="{{$value_wa->_prefix}}" value="{{$value_wa->id}}">{{$value_wa->_name}}</option>

                                                </select>
                                            </div>
                                            @endif

                                            @endforeach
                                            @endforeach
                                            @endforeach
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Địa chỉ chi tiết<span class="required">*</span></label>
                                                    <input id="detailAdd" placeholder="12 Le Loi" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span></span></label>
                                                    <input id="email" placeholder="Your email can be null" type="email">
                                                </div>
                                            </div>

                                            <button class="btn btn-warning mb-4 ml-4" id="address">Add Address</button>


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
@endsection
@section('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
   <script>
    $(document).ready(function(){

        $("#address").click(function(){
                var user_id      = $("#user_id").val();
                var fullname      = $("#fullname").val();
                var phone         = $("#phone").val();
                var city          = $("#city").val();
                var district      = $("#phone").val();
                var precinct      = $("#precinct").val();
                var detailAdd     = $("#detailAdd").val();
                var email         = $("#email").val();
                var data = {
                    'user_id'    : user_id,
                    'fullname'    : fullname,
                    'phone'    : phone,
                    'city'    : city,
                    'district'    : district,
                    'precinct'    : precinct,
                    'detailAdd'    : detailAdd,
                    'email'    : email,
            };
            $.ajax({
                    url : '/cart/address',
                    type: 'post',
                    data: data,
                    success: function($data){
                       toastr.success('Da them san pham vao gio hang')
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
@endsection
