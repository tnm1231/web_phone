@extends('client.master')
@section('content')

<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-stock-status">Stock Status</th>
                                    <th class="li-product-add-cart">add to cart</th>

                                </tr>
                            </thead>

                            <tbody>


                                @php
                                     $status = ['Available','Out of stock', 'Coming soon'];
                                     $color = ['Green','Red','Warning']
                                @endphp
                                @if(isset($wishlist))
                                @foreach ($wishlist as $value )
                                <tr>
                                    <td class="li-product-remove deleteWishlist" data-wish="{{$value->id}}"><a ><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img style="width:100px; height:100px" src="{{$value->wishlist->image_product}}" alt=""></a></td>
                                    <td class="li-product-name"><a href="#">{{$value->wishlist->name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{ empty($value->wishlist->price_sell) ?  number_format($value->wishlist->price_root, 0, '.', ',') . " đ" : number_format($value->wishlist->price_sell, 0, '.', ',') . " đ"}}</span></td>
                                    <td style="color:{{$color[$value->wishlist->status ]}}; font-size:18px" value={{$value->wishlist->status}}><span class="in-stock"> {{$status[ $value->wishlist->status ]}}</span></td>
                                    <td class="li-product-add-cart"><a id="t">add to cart</a></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>

                        </table>
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
            var row;
            $(".deleteWishlist").on("click", function(){
                            // console.log('ok ba nka');
                             var id = $(this).data('wish');
                            //  console.log(idDe);
                            row = $(this);
                        axios
                            .get('/wishlist/delete/' + id)
                            .then((res) => {
                                if(res.data.status == true){
                                    toastr.success("Đã cập nhật giỏ hàng!");
                                    // $('#modalDelete').modal('toggle');
                                    $(row).closest('tr').remove();
                                } else {
                                    toastr.error("Có lỗi xảy ra!");
                                }
                            });
                        });
        });
    </script>
@endsection








