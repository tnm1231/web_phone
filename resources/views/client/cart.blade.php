@extends('client.master')
@section('content')
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @php
                $thanhTien = 0;
                $tongSanPham = 0;
                $total = 0;
                @endphp
                @if(isset($cart))
                @foreach ($cart as $value )
                    @php
                        $donGia = empty($value->product->price_sell)? $value->product->price_root : $value->product->price_sell;
                        $soLuong = $value->qty;
                        $tongSanPham += $value->qty;
                        $total = $total + $donGia * $soLuong;
                    @endphp
                @endforeach
                @endif


                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($cart))
                            @foreach ($cart as $value )
                                <tr>
                                    <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img style="width:100px;height:100px" src="{{$value->product->image_product}}" alt="Li's Product Image"></a></td>
                                    <td class="li-product-name" ><a href="#">{{$value->product->name}}</a></td>
                                    <td class="li-product-price">
                                        <span class="new-price new-price-2">{{ empty($value->product->price_sell) ?  number_format($value->product->price_root, 0, '.', ',') . " đ" : number_format($value->product->price_sell, 0, '.', ',') . "đ"}}</span>
                                    </td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$value->qty}}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($thanhTien,0,'.',',')}}đ</span></td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{number_format($total,0,'.',',')}}</span></li>
                                    <li>Total <span>$130.00</span></li>
                                </ul>
                                <a href="#">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
