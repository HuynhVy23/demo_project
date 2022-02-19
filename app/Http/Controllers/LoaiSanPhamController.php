<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class LoaiSanPhamController extends Controller
{
    protected function fixImage(LoaiSanPham $loaiSanPham){
        if(Storage::disk('public')->exists($loaiSanPham->hinh_anh)){
            $loaiSanPham->hinh_anh = Storage::url($loaiSanPham->hinh_anh);
        }else{
            $loaiSanPham->hinh_anh = '/images/account/1.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sort=isset($_GET['sort'])?$_GET['sort']:'';
        $column='id';
        $type='asc';
         if($sort=='az'){
            $column='ten_loai';
        }else if($sort=='za'){
            $column='ten_loai';
            $type='desc';
        }
        $lstLoaiSanPham=LoaiSanPham::orderBy($column,$type)->get();
        foreach($lstLoaiSanPham as $lsp){
            $this->fixImage($lsp);
        }
        return  view('Catagory.Index',['lstLoaiSanPham'=>$lstLoaiSanPham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstLoaiSanPham=LoaiSanPham::all();
        return view('Catagory.Add')->with('lstLoaiSanPham',$lstLoaiSanPham);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loaiSanPham=new LoaiSanPham;
        $loaiSanPham->fill([
            'ten_loai'=>$request->input('ten_loai'),
        ]);
        $loaiSanPham->save();
        return Redirect::route('catagory.index',['loaiSanPham'=>$loaiSanPham]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiSanPham $loaiSanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiSanPham=LoaiSanPham::find($id);
        $this->fixImage($loaiSanPham);
        return view('Catagory.Update',['loaiSanPham'=>$loaiSanPham]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loaiSanPham=LoaiSanPham::find($id);
        $loaiSanPham->fill([
            'ten_loai'=>$request->input('ten_loai'),
        ]);
        $loaiSanPham->save();
        return Redirect::route('catagory.index',['loaiSanPham'=>$loaiSanPham]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiSanPham  $loaiSanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaiSanPham=LoaiSanPham::find($id);
        $loaiSanPham->delete();
        return Redirect::route('catagory.index');
    }

    public function search(Request $request)
    {
        $lstLoaiSanPham=LoaiSanPham::where('ten_loai','like','%'.$request->post('ten_loai').'%')->get();
        foreach($lstLoaiSanPham as $sp){
            $this->fixImage($sp);
        }
        return view('catagory.index',['lstLoaiSanPham'=>$lstLoaiSanPham]);
    }
}
