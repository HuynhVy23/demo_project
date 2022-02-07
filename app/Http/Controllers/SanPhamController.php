<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SanPhamController extends Controller
{
    public function fixImage(SanPham $sanPham){
        if(Storage::disk('public')->exists($sanPham->hinh_anh)){
            $sanPham->hinh_anh=Storage::url($sanPham->hinh_anh);
        }else{
            $sanPham->hinh_anh='/images/product/auto.jpg';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstSanPham=SanPham::all();
        foreach($lstSanPham as $sp){
            $this->fixImage($sp);
        }
        return view('Product.Index',['lstSanPham'=>$lstSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstLoaiSanPham=LoaiSanPham::all();
        return view('Product.Add',['lstLoaiSanPham'=>$lstLoaiSanPham]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $sanPham=new SanPham();
         $sanPham->fill([
             'ten_san_pham'=>$request->input('ten_san_pham'),
             'mo_ta'=>$request->input('mo_ta'),
             'so_luong'=>$request->input('so_luong'),
             'don_gia'=>$request->input('don_gia'),
             'hinh_anh'=>'',
             'loai_san_pham_id'=>$request->input('ma_loai'),
         ]);
         $sanPham->save();
         if($request->hasFile('hinh_anh')){
             $sanPham->hinh_anh=$request->file('hinh_anh')->store('img/product/'.$sanPham->id,'public');
         }
         $sanPham->save();
         return Redirect::route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sanPham=SanPham::find($id);
        $lstLoaiSanPham=LoaiSanPham::all();
        $this->fixImage($sanPham);
        return view('Product.Update',['sanPham'=>$sanPham,'lstLoaiSanPham'=>$lstLoaiSanPham]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSanPhamRequest  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sanPham=SanPham::find($id);
        if($request->hasFile('hinh_anh')){
            $sanPham->hinh_anh=$request->file('hinh_anh')->store('img/product/'.$sanPham->id,'public');
        }
        $sanPham->fill([
            'ten_san_pham'=>$request->input('ten_san_pham'),
            'mo_ta'=>$request->input('mo_ta'),
            'so_luong'=>$request->input('so_luong'),
            'don_gia'=>$request->input('don_gia'),
            'loai_san_pham_id'=>$request->input('ma_loai'),
        ]);
        
        $sanPham->save();
        return Redirect::route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanPham=SanPham::find($id);
    }
}
