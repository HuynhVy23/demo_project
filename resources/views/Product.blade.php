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
        <a class="btn btn-warning btn-rounded m-b-10 m-l-5" href="{{ route('AddProduct') }}">Add New Book</a>
            <div class="card-body">
            <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Inventory Number</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                                                                    <tr>
                                <td>1</td>
                                <td>Toi thay hoa vang tren co xanh</td>
                                <td>Short Story</td>
                                <td>15000</td>
                                <td>5</td>
                                <td><img src=" "width="60px" height="100px"> </td>
                                <td><a class="btn btn-info btn-rounded" href="{{ route('UpdateProduct') }}"> Update</a></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop