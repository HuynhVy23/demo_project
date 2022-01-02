
@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Category</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
        <a type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5" href="{{ route('AddCatagory') }}">Add New Catagory</a>
            <div class="card-body">
            <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaisp as $loai)
                            <tr>
                                <td>{{ $loai->id }}</td>
                                <td>{{ $loai->ten_loai }}</td>
                                <td>{{ $loai->hinh_anh }}</td>
                                <td><a class="btn btn-info btn-rounded" href="{{ route('UpdateCatagory',['loaiSanPham'=>$loai])}}"> Update</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop