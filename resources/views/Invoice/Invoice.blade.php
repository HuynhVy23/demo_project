@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Invoice</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <div class="card-body">
            <h4 class="card-title">Data Export</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Note</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        
                            <tbody>
                                @foreach ($lstHoaDon as $hd )
                                                        <tr>
                                <td>{{ $hd->ngay_lap }}</td>
                                <td>{{ $hd->dia_chi }}</td>
                                <td>{{ $hd->so_dien_thoai }}</td>
                                <td>{{ $hd->ghi_chu }}</td>
                                <td>{{ $hd->tong_tien }}</td>
                                <td><a class="btn btn-warning btn-rounded" href=""> More</a></td>
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