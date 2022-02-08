@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Product</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
        <a class="btn btn-warning btn-rounded m-b-10 m-l-5" href="{{ route('product.create') }}">Add New Flower</a>
            <div class="card-body">
            <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lstSanPham as $sp)
                            <tr>
                                <td>{{ $sp->id }}</td>
                                <td>{{ $sp->ten_san_pham }}</td>
                                <td>{{ $sp->mo_ta }}</td>
                                <td>{{ $sp->loaiSanPham->ten_loai }}</td>
                                <td>{{ $sp->don_gia }}</td>
                                <td>{{ $sp->so_luong }}</td>
                                <td><img src="{{ $sp->hinh_anh }}" width="100px" height="100px"> </td>
                                <td><a class="btn btn-info btn-rounded" href="{{ route('product.edit',$sp->id) }}"> Update</a></td>
                                <td><form method="post" action="{{route('product.destroy',$sp->id)}}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"class="btn btn-info btn-rounded"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
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