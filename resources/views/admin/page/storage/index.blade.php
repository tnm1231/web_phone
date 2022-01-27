@extends('admin.share.master')
@section('content')
<div class="table-responsive">
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">User_id</th>
                <th class="text-center">Address</th>
                <th class="text-center">Name Product</th>
                <th class="text-center">Image</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bill as $key => $value )
            <tr class="text-center">
                <td style="width:30px"> {{$key+1}} </td>
                <td> {{$value->user_id}}</td>
                <td> {{$value->address->detailAdd}}</td>
                <td> </td>
                <td><img  id="banneredit" style="width:100px; height:100px" src="{{$value->banner}}"></td>
                <td>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input is_view" data-id="{{ $value->id }}" {{ $value->is_view ? 'checked' : '' }}>
                    </div>
                </td>
                <td>
                    <button data-id={{$value->id}} type="button" class="btn btn-primary waves-effect waves-float waves-light callModal" data-bs-toggle="modal" data-bs-target="#addNewCard">
                        Delete
                    </button>
                    <button type="button" data-edit="{{$value->id}}" class="btn btn-danger callEdit" data-bs-toggle="modal" data-bs-target="#editCategory">
                        Edit
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

