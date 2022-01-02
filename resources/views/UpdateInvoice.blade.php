@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Update Invoice</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <form action="{{ route('hoaDon') }}" method="POST" enctype="multipart/form-data">
            
            ID Invoice :<pre></pre><input type="text" value="{{ $hoaDon->id }}" name="mahd" readonly></br></br>
            Username  :<pre></pre><input type="text" value="" name="username" readonly></br></br>
            Date :<pre></pre><input type="text" value="{{ $hoaDon->ngay_lap }}" name="ngaylap" readonly></br></br>
            Full Name :<pre></pre> <input type="text" value="" name="hoten" readonly></br></br>
            Phone :<pre></pre><input type="text" value="{{ $hoaDon->so_dien_thoai }}" name="sdt" readonly></br></br>
            Delivery Address :<pre></pre><input type="text" value="{{ $hoaDon->dia_chi }}" name="diachigh"></br></br>
            Note :<pre></pre><input type="text" value="{{ $hoaDon->ghi_chu }}" name="ghichu"></br></br>
            Total :<pre></pre><input type="text" value="{{ $hoaDon->tong_tien }}" name="tongtien"></br></br>
            Status : <select name="tinhtrang" > 
            <option value="hd0"  >
            
                Dang cho xu li                            </option>
             
            <option value="hd1" selected='selected' >
            
                Xac nhan dat hang                            </option>
             
            <option value="hd2"  >
            
                Da giao hang                            </option>
             
            <option value="hd3"  >
            
                Da huy                            </option>
                                        </select></br></br>
            Shipping Unit :<input type="text" value="" name="ptgh" readonly></br></br>
               <input class="btn btn-success" type="submit" name="submit" value="Submit">
    </form>
                </div>
            </div>
        </div>
    </div>
@stop