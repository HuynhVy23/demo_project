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
            <form action="{{ route('catagory.update',$loaisp->id) }}" method="POST">
                @csrf
                @method('PATCH')
            ID  :<pre></pre><input type="text" value="{{ $loaisp->id }}" name="maloai" readonly></br></br>
            Name  :<pre></pre><input type="text" value="{{ $loaisp->ten_loai }}" name="tenloai"></br></br>
            Image  :<pre></pre><input type="text" value="{{ $loaisp->hinh_anh }}" name="hinhanh"></br></br>
               <input class="btn btn-success" type="submit" name="submit" value="Submit">
               <input class="btn btn-info" type="submit" name="submitD" value="Delete">
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop