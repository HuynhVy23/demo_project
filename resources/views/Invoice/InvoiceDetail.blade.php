@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Invoice Detail</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">
                <h4>hd20210625001 </h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i=0; $i<count($cthoadon);$i++)
                            <tr>
                                <th scope="row">{{ $i+1 }}</th>
                                <td>{{ $cthoadon[$i]->ten_san_pham }}</td>
                                <td>{{ $cthoadon[$i]->so_luong }}</td>
                                <td>{{ $cthoadon[$i]->don_gia }} VND</td>
                                <td>{{ $cthoadon[$i]->tong }} VND</td>
                            </tr>
                            @endfor
                                                                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop