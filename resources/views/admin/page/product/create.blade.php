@extends('admin.share.master')
@section('content')
<section id="input-mask-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Product</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control credit-card-mask" placeholder="" id="name">
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control credit-card-mask" placeholder="" id="slug">
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Category_Id</label>
                        <select class="form-control" id="category_id" required="">
                            <option value=0> Root </option>
                            @foreach ($category as $value)
                            <option value={{$value->id}}> {{$value->name}} </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Brand_Id</label>
                        <select class="form-control" id="brand_id" required="">
                            <option value=0> Root </option>
                            @foreach ($brand as $value)
                            <option value={{$value->id}}> {{$value->name}} </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-12 mb-2">
                            <label class="form-label">Code Product</label>
                            <input type="text" class="form-control credit-card-mask" placeholder="" id="code_product">
                        </div>

                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Quantity</label>
                            <input type="number" class="form-control credit-card-mask" placeholder="" id="quantity">
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                            <label class="form-label">Price root</label>
                            <input type="number" class="form-control credit-card-mask" placeholder="" id="price_root">
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                            <label class="form-label">Price sale</label>
                            <input type="number" class="form-control credit-card-mask" placeholder="" id="price_sale">
                        </div>
                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Select Version</label>
                            <select class="form-control" id="version" required="">
                                    <option value="">Choose...</option>
                                    <option value="0">Null</option>
                                    <option value="1">64 GB</option>
                                    <option value="2">128 GB</option>
                                    <option value="3">256 GB</option>
                                    <option value="4">512 GB</option>
                                    <option value="5">1 TB</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Color</label>
                            <select class="form-control" id="color" required="">
                                    <option value="">Choose...</option>
                                    <option value="0">No Color</option>
                                    <option value="1">White</option>
                                    <option value="2">Red</option>
                                    <option value="3">Blue</option>
                                    <option value="4">Black</option>
                                    <option value="5">Green</option>
                                    <option value="6">Yellow</option>
                            </select>
                        </div>
                        {{-- <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                            <label for="task-tag" class="form-label d-block">Color</label>
                            <select class="form-select task-tag" id="task-tag" name="task-tag[]" multiple="multiple">
                               @foreach ($color as $value)
                               <option>{{$value->name}}</option>
                               @endforeach
                            </select>
                        </div> --}}


                        <div class="col-xl-2 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Status</label>
                            <select id="status" class="form-control" required="">
                                <option>Choose...</option>
                                {{-- hàng có sẵn --}}
                                <option value="0">Available</option>
                                {{-- hết hàng --}}
                                <option value="1">Out of stock</option>
                                {{-- sắp ra mắt --}}
                                <option value="2">Comming soon</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Feature</label>
                            <select id="feature" class="form-control" required="">
                                <option>Choose...</option>
                                <option value="1">New Arrival</option>
                                <option value="0">Bestseller</option>
                            </select>
                        </div>

                        <div class="col-xl-4 col-md-3 col-sm-12 mb-2">
                            <label class="form-label" for="basicInput">Image</label>
                            <div class="input-group">
                              <input name="image_product" id="image_product" class="form-control" required>
                              <a id="lfm" data-input="image_product" data-preview="holderbanner" class="lfm btn btn-light">
                                Choose
                              </a>
                            </div>
                            <img id="holderbanner" class="img-thumbnail mt-1" style="width:333px; height:300px" >
                          </div>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                          <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                          <script>
                                $('.lfm').filemanager('banner');
                          </script>
                          <div class="col-xl-8 col-md-3 col-sm-12 mb-2 mt-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="pill" href="#info_product" role="tab"><i data-feather='clipboard'></i>Infor Product</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#descrpition" role="tab"><i data-feather='edit'></i>Descrpition</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="pill" href="#detail" role="tab"><i data-feather='align-justify'></i>Details</a></li>
                                <li class="nav-item"><a class="nav-link"data-bs-toggle="pill" href="#review" role="tab"><i data-feather='thumbs-up'></i>Review</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="info_product" role="tabpanel">
                                    <textarea id="ckeditorInfoproduct" cols="30" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade active show file-text"  id="description" role="tabpanel">
                                    <textarea id="ckeditorDescription" cols="30" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="detail" role="tabpanel">
                                    <textarea  id="ckeditorDetail" cols="30" class="form-control" rows="10"></textarea>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel">
                                    <textarea  id="ckeditorReview" cols="30" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                            };
                        </script>
                        <script>
                            CKEDITOR.replace('ckeditorInfoproduct', options);
                            CKEDITOR.replace('ckeditorDescription', options);
                            CKEDITOR.replace('ckeditorDetail', options);
                            CKEDITOR.replace('ckeditorReview', options);
                        </script>


                        <div class="col-xl-3 col-md-12 col-sm-12 mb-2">
                            <button type="button" class="btn btn-outline-primary round waves-effect" id="createProduct">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
        $("#name").blur(function(){
                $("#slug").val(toSlug($("#name").val()));
            });

            function toSlug(str) {
                str = str.toLowerCase();
                str = str
                    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
                str = str.replace(/[đĐ]/g, 'd');
                str = str.replace(/([^0-9a-z-\s])/g, '');
                str = str.replace(/(\s+)/g, '-');
                str = str.replace(/-+/g, '-');
                str = str.replace(/^-+|-+$/g, '');
                return str;
            }
            $("#createProduct").click(function(){
                // var product_id = $("#code_product").val();


                var payload = {
                    'name'          :   $("#name").val(),
                    'slug'          :   $("#slug").val(),
                    'category_id'   :   $("#category_id").val(),
                    'brand_id'      :   $("#brand_id"   ).val(),
                    'code_product'  :   $("#code_product").val(),
                    'qty'           :   $("#quantity").val(),
                    'price_root'    :   $("#price_root").val(),
                    'price_sell'    :   $("#price_sale").val(),
                    'color'         :   $("#color").val(),
                    'version'       :   $("#version").val(),
                    'is_view'       :   $("#is_view").val(),
                    'status'        :   $("#status").val(),
                    'feature'       :   $("#feature").val(),
                    'image_product' :   $("#image_product").val(),
                    'info_product'  :   CKEDITOR.instances["ckeditorInfoproduct"].getData(),
                    'description'   :   CKEDITOR.instances["ckeditorDescription"].getData(),
                    'details'       :   CKEDITOR.instances["ckeditorDetail"].getData(),
                    'reviews'       :   CKEDITOR.instances["ckeditorReview"].getData(),
                };
                $.ajax({
                    url : '/admin/product/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Created product successfully!");
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






