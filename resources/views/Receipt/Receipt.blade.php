@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Good Receipt</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <a class="btn btn-warning btn-rounded m-b-10 m-l-5" href="{{ route('AddReceipt') }}">Add New Good Receipt</a>
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                            <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        
                            <tbody>
                                @foreach ($lstHoaDon as $hd )
                            <tr>
                                <td>{{ $hd->id }}</td>
                                <td>{{ $hd->email }}</td>
                                <td>{{ $hd->dia_chi }}</td>
                                <td>{{ $hd->so_dien_thoai }}</td>
                                <td>{{ $hd->ngay_lap }}</td>
                                <td>{{ number_format( $hd->tong_tien, 0, ',', '.') . " VND" }}</td>
                                <td><a class="btn btn-warning btn-rounded" href="{{ route('ShowReceipt',$hd->id) }}">Detail</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        
                    </table>
                    {{ $lstHoaDon->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop