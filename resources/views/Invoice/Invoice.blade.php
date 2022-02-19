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
            <div class="row">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link"  href="{{ Request::url() }}?loaihd=0">Pending<span class="label label-rouded label-primary pull-right" style="margin-left:10px">{{ $pending }}</span></a> </li>
                    <li class="nav-item"> <a class="nav-link"  href="{{ Request::url() }}?loaihd=1">To Ship<span class="label label-rouded label-primary pull-right" style="margin-left:10px">{{ $toship }}</span></a> </li>
                    <li class="nav-item"> <a class="nav-link "  href="{{ Request::url() }}?loaihd=2" role="tab">To Receive<span class="label label-rouded label-primary pull-right" style="margin-left:10px">{{ $toreceive }}</span></a> </li>
                    <li class="nav-item"> <a class="nav-link"  href="{{ Request::url() }}?loaihd=3" role="tab">Complete<span class="label label-rouded label-primary pull-right" style="margin-left:10px">{{ $complete }}</span></a> </li>
                    <li class="nav-item"> <a class="nav-link"  href="{{ Request::url() }}?huy=1" role="tab">Cancel<span class="label label-rouded label-danger pull-right" style="margin-left:10px">{{ $cancel }}</span></a> </li>
            </div>
                <div class="table-responsive m-t-40">
                    <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                            <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Note</th>
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
                                <td>{{ $hd->ghi_chu }}</td>
                                <td>{{ $hd->tong_tien }}</td>
                                <td><a class="btn btn-warning btn-rounded" href=""><i class=""></i></a></td>
                                <td><a class="btn btn-warning btn-rounded" href="{{ route('invoice.show',$hd->id) }}">Detail</a></td>
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