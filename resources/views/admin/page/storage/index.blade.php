@extends('admin.share.master')
@section('content')
<div class="table-responsive">
    <table id="datatable" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Name Category</th>
                <th class="text-center">Banner</th>
                <th class="text-center">Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listCategory as $key => $value )
            <tr class="text-center">
                <td style="width:30px"> {{$key+1}} </td>
                <td> {{$value->name}}</td>
                {{-- <td> {{empty($value->nameParent) ? 'root' : $value->nameParent}}</td> --}}
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

