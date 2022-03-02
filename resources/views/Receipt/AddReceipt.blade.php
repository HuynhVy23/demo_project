@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Add Good Receipt</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <div class="card-body">
                <div class="table-responsive m-t-40">
                    <form action="{{ route('Add') }}" method="POST">
                        @csrf
                    <table class="display nowrap table table-hover table-striped" cellspacing="0" width="100%" id="receipt">
                        <thead>
                            <tr>
                                <th>Name Product</th>
                            <th>Price</th>
                                <th>Quanlity</th>
                            </tr>
                        </thead>
                            <tbody>
                               
                            <tr>
                                <td> <select name="id_san_pham" class="form-control">
                                    @foreach ($sanpham as $sp)
                                    <option value="{{ $sp->id }}">{{ $sp->ten_san_pham }}</option>
                                    @endforeach
                                </select></td>
                                <td><input class="form-control" type="text" name="don_gia"onkeypress='return event.charCode>=48 && event.charCode<=57'></td>
                                <td><input class="form-control" type="text" name="so_luong"onkeypress='return event.charCode>=48 && event.charCode<=57'></td>
                               <td><button type="submit" class="btn btn-info" value="Submit">Submit</button></td>
                               @if (!empty($error))
            <em style="color: red"> {{ $error }}</em>
            @endif
                            </tr>
                            </tbody>
                       
                        
                    </table>
                    
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop
