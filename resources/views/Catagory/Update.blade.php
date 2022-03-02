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
            Name  :<pre></pre><input type="text" value="{{ $loaiSanPham->ten_loai }}" name="ten_loai"></br></br>
               <input class="btn btn-success" type="submit" name="submit" value="Submit">
               @if (!empty($error))
<em style="color: red"> {{ $error }}</em>
@endif
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop