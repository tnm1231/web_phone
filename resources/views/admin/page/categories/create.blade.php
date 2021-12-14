@extends('admin.share.master')
@section('content')
<section id="basic-input">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Creat Category</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Name Category</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Slug Category</label>
                                <input type="text" id="slug" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Parent_id</label>
                        <select class="form-control" id="parent_id" required="">
                                <option value=0> Root </option>
                                @foreach ($category as $value)
                                <option value={{$value->id}}> {{$value->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="is_view" required="">
                                <option value="">Choose...</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                        </div>

                        <div class="form-group col-xl-6 col-md-6 col-12">
                        <div class="row">
                            <div class="col-md-12">
                            <label class="form-label" for="basicInput">Banner</label>
                            <div class="input-group">
                                <input id="banner" name="image" class="form-control" required>
                                <a data-input="banner" data-preview="holder-image" class="lfm btn btn-light"> Choose </a>
                            </div>
                            <img id="holder-image" class="card-img-top" style="width:500px; height:300px; margin-top:30px">
                            </div>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
                            <script>
                                  $('.lfm').filemanager('banner');
                            </script>
                        </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="col-4">
                            <button type="button" id="createCategory" class="btn btn-outline-success round waves-effect">Button</button>
                            </div>
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
            $("#createCategory").click(function(){

                var payload = {
                    'name'              :   $("#name").val(),
                    'slug'              :   $("#slug").val(),
                    'parent_id'         :   $("#parent_id").val(),
                    'is_view'           :   $("#is_view").val(),
                    'banner'            :   $("#banner").val(),

                };
                $.ajax({
                    url : '/admin/category/create',
                    type: 'post',
                    data: payload,
                    success: function($xxx){
                        if($xxx.status == true){
                            toastr.success("Created category successfully!");
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
