
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
        <form action="" method="post" enctype="multipart/form-data">
Username : <input type="text" name="txtUsername"/><em style="color:tomato">*</em></br></br>
Password : <input type="password" name="txtMatKhau"/><em style="color:tomato">*</em></br></br>
Full name : <input type="text" name="txtHoTen"/><em style="color:tomato">*</em></br></br>
Address : <input type="text" name="txtDiaChi"/></br></br>
Email : <input type="email" name="txtEmail"/></br></br>
Phone : <input type="text" name="txtDienThoai" onkeypress='return event.charCode>=48 && event.charCode<=57'/></br></br>
Sex : <input type="radio" name="gender" value="Male" checked="checked" id="Male"/>Male
<input type="radio" name="gender" value="Female" id="Female"/>Female</br></br>

<label for="file">Avatar : </label>
<input type="file" name="file" id="file"/>
<br/>
<input class="btn btn-success" type="submit" name="submitTK" value="Submit"/></br></br>
<label style="color: red;"></label>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop