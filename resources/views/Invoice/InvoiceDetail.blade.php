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
                <h4>Id : {{ $cthoadon[0]->id_hoa_don }}  </h4>
                <h5>Email : {{ $cthoadon[0]->email }}</h5>
                <h5>Address : {{ $cthoadon[0]->dia_chi }}</h5>
                <h5>Phone : {{ $cthoadon[0]->so_dien_thoai }}</h5>
                <h5>Status : @if ($cthoadon[0]->loai_hd==5||$cthoadon[0]->loai_hd==0)<p style="color: red">Pending</p>
                    @elseif ($cthoadon[0]->loai_hd==1) <p style="color: red">To Ship</p>
                    @elseif ($cthoadon[0]->loai_hd==2) <p style="color: red">To Recieve</p>
                    @elseif ($cthoadon[0]->loai_hd==3) <p style="color: red">Complete</p>
                    @else <p style="color: red">Cancelled</p>
                @endif</h5>
                <h5>Total : {{ $cthoadon[0]->tong_tien }}</h5>
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
                                <td>{{ $cthoadon[$i]->so_luong_ct }}</td>
                                <td>{{ $cthoadon[$i]->don_gia_ct }} VND</td>
                                <td>{{ $cthoadon[$i]->tong }} VND</td>
                            </tr>
                            @endfor
                            
                                                                    </tbody>
                                                                    
                    </table>
                   
                </div>
                @if ($cthoadon[0]->loai_hd!=3&&$cthoadon[0]->loai_hd!=4)
                <a class="btn btn-warning btn-rounded" href="{{ route('invoice.edit',$cthoadon[0]->id_hoa_don) }}"><i class="fa fa-check"></i></a>
                @endif
                @if ($cthoadon[0]->loai_hd==5)
                                                                    
                                                                    <a class="btn btn-warning btn-rounded" href="{{ route('Cancel',$cthoadon[0]->id_hoa_don) }}"><i class="fa fa-close"></i></a>
                                                                    @endif  
            </div>
        </div>
    </div>
</div>
@stop