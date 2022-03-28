 <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="/client/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Popper js -->
        <script src="/client/js/vendor/popper.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="/client/js/bootstrap.min.js"></script>
        <!-- Ajax Mail js -->
        <script src="/client/js/ajax-mail.js"></script>
        <!-- Meanmenu js -->
        <script src="/client/js/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="/client/js/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="/client/js/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="/client/js/owl.carousel.min.js"></script>
        <!-- Magnific popup js -->
        <script src="/client/js/jquery.magnific-popup.min.js"></script>
        <!-- Isotope js -->
        <script src="/client/js/isotope.pkgd.min.js"></script>
        <!-- Imagesloaded js -->
        <script src="/client/js/imagesloaded.pkgd.min.js"></script>
        <!-- Mixitup js -->
        <script src="/client/js/jquery.mixitup.min.js"></script>
        <!-- Countdown -->
        <script src="/client/js/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="/client/js/jquery.counterup.min.js"></script>
        <!-- Waypoints -->
        <script src="/client/js/waypoints.min.js"></script>
        <!-- Barrating -->
        <script src="/client/js/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="/client/js/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="/client/js/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="/client/js/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="/client/js/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="/client/js/main.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61e02eb4f7cf527e84d1f5f9/1fp9rcth9';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    {{-- <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script> --}}
    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{$error}}");
            @endforeach
            @endif
    </script>


    <!--End of Tawk.to Script-->
    @jquery
    @toastr_js
    @toastr_render

    <script>
        // var addToCartButtons = document.getElementsByClassName('single-product-wrap')
        //     for (var i = 0; i < addToCartButtons.length; i++){
        //         var button = addToCartButtons[i]
        //         button.addEventListener('click', addToCartClicked)
        //     }
        //     function addToCartClicked(event){
        //         var button = event.target
        //         var shopItem = button.parentElement.parentElement.parentElement
        //         var itemId = shopItem.getElementsByClassName('getId')[0].value;
        //         console.log(itemId);
        //     }

        $(document).ready(function(){
            var addToCartButtons = document.getElementsByClassName('single-product-wrap')
            for (var i = 0; i < addToCartButtons.length; i++){
                var button = addToCartButtons[i]
                button.addEventListener('click', addToCartClicked)
            }
            function addToCartClicked(event){
                var button = event.target
                var shopItem = button.parentElement.parentElement.parentElement
                var itemId = shopItem.getElementsByClassName('getId')[0].value;
                var addItem = {
                    'qty'    : 1,
                    'product_id'    : itemId,
                }
                $.ajax({
                    url : '/cart',
                    type: 'post',
                    data: addItem,
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
            }

            $('#loginButton').click(function(e){
                var email      = $("#email_login").val();
                var password     = $("#password_login").val();

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
                            setTimeout(function(){location.reload()}, 1000);
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
            $('#registerButton').click(function(e){
            var email        = $("#email_register").val();
            var password     = $("#password_register").val();
            var re_password  = $("#re_password_register").val();
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
                url : '/register',
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


        $(".deleteCart").click(function() {
                var id = $(this).data('id');
                row = $(this);
                // console.log("Chuẩn bị xóa loại sản phẩm có id: " + id);
                $(this).closest('li').remove();
                $.ajax({
                    url: '/cart/delete/' + id,
                    type: 'get',
                    success: function($data){
                        // $('#deleteCategory').modal('hide');
                        toastr.success('Deleted product successfully!!','success');
                    },
                });

        });
        $("#addToCart").click(function(){
                var qty      = $("#qty").val();
                var product_id      = $("#product_id").val();
                var data = {
                    'qty'    : qty,
                    'product_id'    : product_id,
            };
            $.ajax({
                    url : '/cart',
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
        //     var addToCartButtons = document.getElementsByClassName('add-cart')
        //     for (var i = 0; i < addToCartButtons.length; i++){
        //         var button = addToCartButtons[i]
        //         button.addEventListener('click', addToCartClicked)
        //     }
        //     function addToCartClicked(event){
        //         var button = event.target
        //         var shopItem = button.parentElement.parentElement
        //         console.log(shopItem);
        //         var itemId = shopItem.getElementsByClassName('getId')[0].innerText;
        //         console.log(itemId);
        //     }
        // $(".add-cart").click(function(){
        //     var id = document.getElementsByClassName("getId");
        //         console.log(id);

        // });




            $("#addToWishList").click(function(){
                var product_id      = $("#product_id").val();
                var data = {
                    'product_id'    : product_id,
            };
            $.ajax({
                    url : '/wishlist',
                    type: 'post',
                    data: data,
                    success: function($data){
                       toastr.success('Da them san pham vao muc yeu thich')
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
