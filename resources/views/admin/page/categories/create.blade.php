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
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Slug Category</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group col-xl-4 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Parent_id</label>
                            <select class="form-control" id="select-country1" required="">
                                <option value="">Select Country</option>
                                <option value="usa">USA</option>
                                <option value="uk">UK</option>
                                <option value="france">France</option>
                                <option value="australia">Australia</option>
                                <option value="spain">Spain</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please select your country</div>
                        </div>
                        <div class="form-group col-xl-6 col-md-6 col-12">
                        <label class="form-label" for="basicInput">Is_view</label>
                            <select class="form-control" id="select-country1" required="">
                                <option value="">Choose..</option>
                                <option value=1>Visible</option>
                                <option value=0>Disable</option>
                            </select>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="helperText">Banner</label>
                                <input type="text" id="helperText" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            <button type="button" class="btn btn-outline-success round waves-effect">Success</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
