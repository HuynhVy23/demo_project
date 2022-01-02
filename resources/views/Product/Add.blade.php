@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Add New Book</h3> 
    </div>
</div>
@stop
@section('main')
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="button-list">
        <form action="" method="post" enctype="multipart/form-data">

            Code Book : <input type="text" name="txtMaSach"/></br></br>
            Name Book: <input type="text" name="txtTenSach"/></br></br>
            Code Type : <input type="text" name="txtMaLoai"/></br></br>
            Code Authur: <input type="text" name="txtMaTacGia"/></br></br>
            Price : <input type="text" name="txtDonGia"/></br></br>
            Page : <input type="text" name="txtSoTrang"/></br></br>
            TonKho : <input type="text" name="txtTonKho"/></br></br>
            Noi Dung : <input type="text" name="txtNoiDung"/></br></br>
            <label for="file">Book Picture : </label>
            <input type="file" name="file" id="file"/>
            <br/>
            <input class="tg-btn" type="submit" name="submit" value="Submit"/>
        </form>
        </div>
            </div>
    </div>
</div>
@stop