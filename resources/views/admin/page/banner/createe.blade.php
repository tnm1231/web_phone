@extends('admin.share.master')
@section('content')
    <div class="row match-height">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label" for="basicInput">Main Banner</label>
                                    <div class="input-group">
                                        <input id="banner" name="banner" placeholder="Example image below 770x475px"  class="form-control" >
                                        <a data-input="banner" data-preview="holder-image" class="lfm btn btn-light"> Choose </a>
                                    </div>
                                    <img id="holder-image" src="/laravel-filemanager/files/shares/Screen Shot 2021-12-28 at 1.55.54 PM.png"  class="card-img-top" style="width:481.25px; height:296.875px; margin-top:30px">
                                    </div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>
                                          $('.lfm').filemanager('banner');
                                    </script>
                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label" for="basicInput">Small Banner 1</label>
                                    <div class="input-group">
                                        <input id="banner2" name="banner2" placeholder="Example image below 770x475px" class="form-control" >
                                        <a data-input="banner2" data-preview="holder-image2" class="lfm btn btn-light"> Choose </a>
                                    </div>
                                    <img id="holder-image2" src="/laravel-filemanager/files/shares/banner example/Screen Shot 2021-12-28 at 2.07.37 PM.png" class="card-img-top" style="width:481.25px; height:296.875px; margin-top:30px">
                                    </div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>
                                          $('.lfm').filemanager('banner');
                                    </script>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label" for="basicInput">Small Banner 3</label>
                                    <div class="input-group">
                                        <input id="banner3" name="banner3" placeholder="Example image below 770x475px" class="form-control" >
                                        <a data-input="banner3" data-preview="holder-image3" class="lfm btn btn-light"> Choose </a>
                                    </div>
                                    <img id="holder-image3" src="/laravel-filemanager/files/shares/banner example/Screen Shot 2021-12-28 at 2.08.04 PM.png" class="card-img-top" style="width:481.25px; height:296.875px; margin-top:30px">
                                    </div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>
                                          $('.lfm').filemanager('banner');
                                    </script>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label class="form-label" for="basicInput">Sub Banner</label>
                                    <div class="input-group">
                                        <input id="banner4" name="banner4" placeholder="Example image below 1170x400px" class="form-control" >
                                        <a data-input="banner4" data-preview="holder-image4" class="lfm btn btn-light"> Choose </a>
                                    </div>
                                    <img id="holder-image4" src="/laravel-filemanager/files/shares/banner example/Screen Shot 2021-12-28 at 2.08.30 PM.png" class="card-img-top" style="width:600px; height:200px; margin-top:30px">
                                    </div>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                                    <script>
                                          $('.lfm').filemanager('banner');
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input text in banner</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mt-1">
                            <br>
                            <br>
                            <br>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Name Product</label>
                                <input type="text" id="name" class="form-control" placeholder="eg. Chamcham Galaxy S9 | S9+" >
                            </div>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Start price</label>
                                <input type="text" id="price" class="form-control" placeholder="eg. $824.00" >
                            </div>

                            <div class="row">
                                <label class="form-label" for="basicInput">Sale offer</label>
                                <input type="text" id="sale" class="form-control" placeholder="eg. -20% Off" >
                            </div>
                            <div class="row">
                                <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Name Product</label>
                                <input type="text" id="name2" class="form-control" placeholder="eg. Work Desk Surface Studio 2018" >
                            </div>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Start price</label>
                                <input type="text" id="price2" class="form-control" placeholder="eg. $824.00" >
                            </div>

                            <div class="row">
                                <label class="form-label" for="basicInput">Sale offer</label>
                                <input type="text" id="sale2" class="form-control" placeholder="eg. Black Friday" >
                            </div>
                            <div class="row">
                                <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view2" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Name Product</label>
                                <input type="text" id="name3" class="form-control" placeholder="eg. Phantom 4 Pro+ Obsidian" >
                            </div>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Start price</label>
                                <input type="text" id="price3" class="form-control" placeholder="eg. $1849.00" >
                            </div>

                            <div class="row">
                                <label class="form-label" for="basicInput">Sale offer</label>
                                <input type="text" id="sale3" class="form-control" placeholder="eg. -10% Off" >
                            </div>
                            <div class="row">
                                <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view3" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-12 mt-1">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Name Product</label>
                                <input type="text" id="name4" class="form-control" placeholder="eg. Meito Accessories 2018" >
                            </div>
                            <div class="mb-1 row">
                                <label class="form-label" for="basicInput">Start price</label>
                                <input type="text" id="price4" class="form-control" placeholder="eg. $1209.00" >
                            </div>

                            <div class="row">
                                <label class="form-label" for="basicInput">Sale offer</label>
                                <input type="text" id="sale4" class="form-control" placeholder="eg. -20% Off" >
                            </div>
                            <div class="row">
                                <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view4" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4">
        <button type="button" id="createBanner" class="btn btn-outline-success round waves-effect">Button</button>
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

            $("#createBanner").click(function(){

                var payload = {
                    'main_banner_1'              :   $("#banner").val(),
                    'main_banner_2'              :   $("#banner2").val(),
                    'main_banner_3'              :   $("#banner3").val(),
                    'sub_banner_4'              :   $("#banner4").val(),
                    'name_product'               :   $("#name").val(),
                    'start_price'                :   $("#price").val(),
                    'sale_offer'                 :   $("#sale").val(),
                    'is_view'                    :  $("#is_view").val(),
                    'name_product_2'             :   $("#name2").val(),
                    'start_price_2'              :   $("#price2").val(),
                    'sale_offer_2'               :   $("#sale2").val(),
                    'is_view_2'                  :  $("#is_view").val(),

                    'name_product_3'             :   $("#name3").val(),
                    'start_price3'               :   $("#price3").val(),
                    'sale_offer_3'               :   $("#sale3").val(),
                    'is_view_3'                  :  $("#is_view").val(),


                    'name_product_4'              :   $("#name4").val(),
                    'start_price4'               :   $("#price4").val(),
                    'sale_offer_4'                :   $("#sale4").val(),
                    'is_view_4'                 :  $("#is_view").val(),


                };
                $.ajax({
                    url : '/admin/banner/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Created banner successfully!");
                        }
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
@endsection
