
@extends('layout.layout')
@section('container')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Category</h3> </div>
</div>
@stop
@section('main')
<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="button-list">
            <a type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5" href="{{ route('catagory.create') }}">Add New Catagory</a>
        <div class="row" style="padding: 15px">
        <form action="{{ route('SearchCategory') }}" method="POST">
            @csrf
            <input type="text" name="ten_loai">
            <button type="submit"class="btn btn-info btn-rounded">Search</button>
        </form>
        <select name="sort" id="sort" style="position:absolute;right:50px">
            <option value="">Select </option>
            <option value="{{ Request::url() }}?sort=az">A->Z</option>
            <option value="{{ Request::url() }}?sort=za">Z->A</option>
        </select>
        </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Total product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lstLoaiSanPham as $loai)
                            <tr>
                                <td>{{ $loai->id }}</td>
                                <td>{{ $loai->ten_loai }}</td>
                                <td>{{ $loai->totalsanpham->count() }}</td>
                                <td><a class="btn btn-info btn-rounded" href="{{ route('catagory.edit',$loai->id)}}"> <i class="fa fa-edit"></a></td>
                                <td><form method="post" action="{{route('catagory.destroy',$loai->id)}}">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit"class="btn btn-info btn-rounded"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@stop