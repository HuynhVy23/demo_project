@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Catagory Update</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <form action="{{ route('catagory.update',$loaiSanPham->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
            ID  :<pre></pre><input type="text" value="{{ $loaiSanPham->id }}" name="id" readonly></br></br>
            Name  :<pre></pre><input type="text" value="{{ $loaiSanPham->ten_loai }}" name="ten_loai"></br></br>
            Avatar  : <img style="width:100px;max-height:100px;object-fit:contain" src="{{ $loaiSanPham->hinh_anh }}">
    <input type="file" name="hinh_anh" accept="img/*"/></br></br>
               <input class="btn btn-success" type="submit" name="submit" value="Submit">
               <input class="btn btn-info" type="submit" name="submitD" value="Delete">
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop