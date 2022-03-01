
@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Account</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <form action="{{ route('SearchAccount') }}" method="GET">
                @csrf
                <input type="text" name="key" placeholder="Email,name,phone">
                <button type="submit"class="btn btn-info btn-rounded"><i class="fa fa-search"></i></button>
            </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Full Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lstKhachHang as $kh)
                            <tr>
                                <td>{{ $kh->email }}</td>
                                <td>{{ $kh->mat_khau }}</td>
                                <td>{{ $kh->ho_ten }}</td>
                                <td>{{ $kh->so_dien_thoai }}</td>
                                <td>{{ $kh->dia_chi }}</td>
                                <td><img src="{{ $kh->hinh_anh }}" width="100px" height="100px"> </td>
                                @if ($kh->khoa==1)
                                <td><a class="btn btn-danger btn-rounded" href="{{ route('account.edit',$kh->id)}}"> <i class="fa fa-lock"></i></a></td>
                                @else
                                <td><a class="btn btn-info btn-rounded" href="{{ route('account.edit',$kh->id)}}"> <i class="fa fa-lock"></i></a></td>
                                @endif
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $lstKhachHang->appends(request()->all())->links() }}
            </div>
        </div>
        </div>
    </div>
</div>
@stop