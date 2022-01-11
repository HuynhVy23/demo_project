
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
        <form action="{{ route('account.store') }}" method="post" enctype="multipart/form-data">
            @csrf
Username : <input type="text" name="Username"/><em style="color:tomato">*</em></br></br>
Password : <input type="password" name="MatKhau"/><em style="color:tomato">*</em></br></br>
Full name : <input type="text" name="HoTen"/><em style="color:tomato">*</em></br></br>
Address : <input type="text" name="DiaChi"/></br></br>
Email : <input type="email" name="Email"/></br></br>
Phone : <input type="text" name="DienThoai" onkeypress='return event.charCode>=48 && event.charCode<=57'/></br></br>
Avatar : <input type="file" name="HinhAnh" accept="img/*"/><em style="color:tomato">*</em></br></br>
<input class="btn btn-success" type="submit" name="submitTK" value="Submit"/></br></br>
<label style="color: red;"></label>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop