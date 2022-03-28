@extends('admin.share.master')
@section('content')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Name</th>
                <th class="text-center">Qty</th>
                <th class="text-center">Address</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value )
            <tr class="text-center">
                <td style="width:30px"> {{$key+1}} </td>
                <td>{{$value->product->name}}</td>
                <td>{{$value->qty}}</td>
                <td>{{$value->fullname}}, {{$value->phone}}, {{$value->wardName}}, {{$value->_name}}, {{$value->provinceName}},</td>
                <td><button class="btn btn-primary">{{$value->status}}</button></td>
                <td></td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection

