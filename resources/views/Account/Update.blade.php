@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Account Update</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-6">
        <div class="card">
        <div class="button-list">
            <form action="{{ route('account.update',$khachHang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                Username : <input type="text" name="Username" value="{{ $khachHang->ten_dang_nhap }}"/><em style="color:tomato">*</em></br></br>
    Password : <input type="password" name="MatKhau" value="{{ $khachHang->mat_khau }}"/><em style="color:tomato">*</em></br></br>
    Full name : <input type="text" name="HoTen" value="{{ $khachHang->ho_ten }}"/><em style="color:tomato">*</em></br></br>
    Address : <input type="text" name="DiaChi" value="{{ $khachHang->dia_chi }}"/></br></br>
    Email : <input type="email" name="Email" value="{{ $khachHang->email }}"/></br></br>
    Phone : <input type="text" name="DienThoai" value="{{ $khachHang->so_dien_thoai }}" onkeypress='return event.charCode>=48 && event.charCode<=57'/></br></br>
    Avatar  : <img style="width:100px;max-height:100px;object-fit:contain" src="{{ $khachHang->hinh_anh }}">
    <input type="file" name="HinhAnh" accept="img/*"/></br></br>
    <input class="btn btn-success" type="submit" name="submitTK" value="Submit"/></br></br>
    <label style="color: red;"></label>
        </form>
        </div>
        </div>
    </div>
</div>
@stop