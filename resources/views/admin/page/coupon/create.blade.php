@extends('admin.share.master')
@section('content')
<section id="basic-input">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Coupon</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Coupon code</label>
                                <input type="text" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Type</label>
                                <input type="text" id="slug" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Slug Category</label>
                                <input type="text" id="slug" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">Options</h4>
                        </div>
                        <div class="col-xl-7 col-md-7 col-12">
                            <div class="mb-1">
                                <div class="form-check form-check-info">
                                    <input type="checkbox" class="form-check-input" id="colorCheck6" >
                                    <label class="form-check-label text-nowrap" for="colorCheck6">Limit to a product or category</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-5 col-12">
                            <div class="mb-1">
                                <select class="form-select" id="basicSelect">
                                    <option>IT</option>
                                    <option>Blade Runner</option>
                                    <option>Thor Ragnarok</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7 col-12">
                            <div class="mb-1">
                                <div class="form-check form-check-info">
                                    <input type="checkbox" class="form-check-input" id="colorCheck6" >
                                    <label class="form-check-label text-nowrap" for="colorCheck6">Limit number of total uses</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-5 col-12">
                            <div class="mb-1">
                                <select class="form-select" id="basicSelect">
                                    <option>IT</option>
                                    <option>Blade Runner</option>
                                    <option>Thor Ragnarok</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7 col-12">
                            <div class="mb-1">
                                <div class="form-check form-check-info">
                                    <input type="checkbox" class="form-check-input" id="colorCheck6" >
                                    <label class="form-check-label text-nowrap" for="colorCheck6">Require minimum order total</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-5 col-12">
                            <div class="mb-1">
                                <select class="form-select" id="basicSelect">
                                    <option>IT</option>
                                    <option>Blade Runner</option>
                                    <option>Thor Ragnarok</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <br>
                <br>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-7 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Coupon Start </label>
                                <input type="date" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Coupon End</label>
                                <input type="date" id="slug" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="basicInput">Coupon End</label>
                                <input type="date" id="slug" class="form-control" required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

