<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Redirect;

class Catagory extends Controller
{
    public function create()
    {
        return view('Catagory.Add');
    }

    public function store(Request $request)
    {
        $loaisp=new LoaiSanPham();
        $loaisp->fill([
            'ten_loai'=>$request->input('tenloai'),
            'hinh_anh'=>$request->input('hinhanh'),
        ]);
        $loaisp->save();
        return Redirect::route('Catagory',['loaisp'=>$loaisp]);
    }

    public function index()
    {
        $loaiSanPham=LoaiSanPham::all();
        return view('Catagory.Index',['loaisp'=>$loaiSanPham]);
    }

    public function update(Request $request,$id)
    {
        $loaiSanPham=LoaiSanPham::find($id);
        $loaiSanPham->fill([
            'ten_loai'=>$request->input('tenloai'),
            'hinh_anh'=>$request->input('hinhanh')
        ]);
        $loaiSanPham->save();
        return Redirect::route('catagory.index');
    }

    public function edit($id)
    {
        $loaisp=LoaiSanPham::find($id);
        return view('Catagory.Update',['loaisp'=>$loaisp]);
    }
}
