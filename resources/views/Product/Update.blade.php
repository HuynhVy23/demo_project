@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Update Account</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-6">
        <div class="card">
        <div class="button-list">
                        <form action="" method="post" enctype="multipart/form-data">
    
                            <input type="hidden" name="txtMaSach" value="sgk001"/></br></br>
                            <input type="text" name="txtHinhAnh" hidden='true' value=""/></br></br>
                            Name Book: <input type="text" name="txtTenSach" value="Truyen tranh"/></br></br>
                            Price : <input type="text" name="txtDonGia" value="5000"/></br></br>
                            Page : <input type="text" name="txtSoTrang" value="79" /></br></br>
                            Inventory : <input type="text" name="txtTonKho" value="10"/></br></br>
                            <label for="file">Book Picture : </label>
                            <img src="">
                            <input type="file" name="file" id="file"/>
                            <br/>
                            <input class="btn btn-primary btn-rounded m-b-10 m-l-5" type="submit" name="submit" value="Cập Nhật"/>
                        </form>
                        </div>
                    </div>
                </div>
</div>
                @stop