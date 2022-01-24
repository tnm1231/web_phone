@extends('client.master')
@section('content')

<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table" id="myTable">

                            <thead>
                                <tr>
                                    <th class="li-product-remove">Remove</th>
                                    <th class="li-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- <tr>
                                    <td class="li-product-remove"><a href="#"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img style="width:100px;height:100px" src="we" alt="Li's Product Image"></a></td>
                                    <td class="li-product-name" ><a href="#">wer</a></td>
                                    <td class="li-product-price">
                                        <span class="new-price new-price-2">wer</span>
                                    </td>
                                    <td class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="werwer" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">1</span></td>
                                </tr> --}}

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
                                    <li>Subtotal <span id="subTotal"></span></li>
                                    <li>Discount from product <span id="discount"></span></li>
                                    <li>Discount from coupon <span id="coupon"></span></li>
                                    <li>Total <span id="total"></span></li>
                                </ul>
                                <a href="/client/checkout">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

    <script>
        $(document).ready(function(){

            function loadData(){
                axios
                    .get('/client/cart')
                    .then((res) => {
                        var data = res.data.data;
                        // console.log(res.data.data);
                        var html = '';
                        var subTotal = 0;
                        var discount = 0;
                        var total = 0;
                        var coupon = 0;
                        var qnty = res.data.data.qty;
                        var productId = res.data.data.product_id;
                        var id = res.data.data.id;



                        $.each(data, function(key, value) {


                            subTotal += value.price_root*value.qty;
                            discount -= value.price_root*value.qty - value.price_sell*value.qty ;
                            total = subTotal + discount + coupon;
                            var name = 'qty' + key;
                            var link = '/client/detail/' + value.slug + '-' + value.product_id;
                            html +=   '<tr>';
                            html +=   '<td class="li-product-remove deleteCart" data-delete="'+ value.id +'" id="'+ value.product_id +'" ><a href="#"><i class="fa fa-times"></i></a></td>';
                            html +=   '<td class="li-product-thumbnail"><a href="#"><img style="width:100px;height:90px" src="' + value.image_product +'" ></a></td>';
                            html +=   '<td class="li-product-name" ><a href="'+ link +'">';
                            html +=   value.name;
                            html +=   '</a></td>';
                            html +=   '<td class="li-product-price">';
                            html +=   '<span class="new-price new-price-2">';
                            html +=   new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(value.price_root);
                            html +=   '</span>';
                            html +=   '</td>';
                            html += '<td class="quantity">';
                            html += '<label>Quantity</label>';
                            html += '<div class="cart-plus-minus">';
                            html += '<input class="cart-plus-minus-box qtyCart"  data-qty="'+ value.id +'" min=1 name="'+ name +'" id="' + name +'" value="'+ value.qty +'" type="text">';
                            html += '<div class="dec qtybutton" ><i class="fa fa-angle-down"></i></div>';
                            html += '<div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>';
                            // html += '<div class="dec qtybutton" data-qty="'+ value.id +'" ><i class="fa fa-angle-down"></i></div>';
                            // html += '<div class="inc qtybutton" data-qty="'+ value.id +'" ><i class="fa fa-angle-up"></i></div>';
                            html +='</div></td>';
                            html +=   '<td class="product-subtotal"><span class="amount">';
                            html +=   new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(value.price_root*value.qty);
                            html +=   '</span></td>';
                            html +=   '</tr>';

                        });
                        $('#myTable tbody').html(html);
                        $('#subTotal').text( new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(subTotal));
                        $('#discount').text( new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(discount));
                        $('#total').text( new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(total));
                        $('#coupon').text( new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(coupon));
                        $(".cart-plus-minus").append('<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>');
                        $(".qtybutton").on("click", function() {
                            var $button = $(this);
                            var oldValue = $button.parent().find("input").val();
                            if ($button.hasClass('inc')) {
                            var newVal = parseFloat(oldValue) + 1;
                            } else {
                                // Don't allow decrementing below zero
                            if (oldValue > 0) {
                                var newVal = parseFloat(oldValue) - 1;
                                } else {
                                newVal = 0;
                            }
                            }
                            $button.parent().find("input").val(newVal);

                            var id = $(this).parent().find("input").data('qty');
                            var qty = $button.parent().find("input").val();
                            var payload = {
                                            'id' : id,
                                            'qty': qty,
                                        };
                                        axios
                                            .post('/client/cart/editQty', payload)
                                            .then((res) => {
                                                if(res.data.status == true){
                                                    toastr.success("Cart is updated successfully!");
                                                    loadData();
                                                }else {
                                                    toastr.error("Sorry,it has error somewhere!")
                                                }
                                            });

                        });
                        $(".deleteCart").on("click", function(){
                            // console.log('ok ba nka');
                             var idDe = $(this).data('delete');
                            //  console.log(idDe);
                        axios
                            .get('/cart/delete/' + idDe)
                            .then((res) => {
                                if(res.data.status == true){
                                    toastr.success("Đã cập nhật giỏ hàng!");
                                    // $('#modalDelete').modal('toggle');
                                    loadData();
                                } else {
                                    toastr.error("Có lỗi xảy ra!");
                                }
                            });





                        });
                    });
            }
            loadData();

            $(document).on('change', '.qtyCart', function(){
                // console.log('ok na kha');
                var id = $(this).data('qty');
                var qty = $(this).val();
                var payload = {
                    'id'    : id,
                    'qty'   : qty,
                };
                axios
                    .post('/client/cart/editQty', payload)
                    .then((res) => {
                            if(res.data.status == true){
                            toastr.success("Cart is updated successfully!");
                // loadData();
                            }else {
                            oastr.error("Sorry,it has error somewhere!")
                            }
                });
            });


        });
    </script>
@endsection








