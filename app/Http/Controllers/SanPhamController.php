<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class SanPhamController extends Controller
{
    public function fixImage(SanPham $sanPham)
    {
        if (Storage::disk('public')->exists($sanPham->hinh_anh)) {
            $sanPham->hinh_anh = Storage::url($sanPham->hinh_anh);
        } else {
            $sanPham->hinh_anh = '/images/product/auto.jpg';
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
        if($sort=='giatang'){
            $column='don_gia';
        }else if($sort=='giagiam'){
            $column='don_gia';
            $type='desc';
        }else if($sort=='az'){
            $column='ten_san_pham';
        }else if($sort=='za'){
            $column='ten_san_pham';
            $type='desc';
        }

        if(!isset($_GET['loai'])||$_GET['loai']==null){
            $lstSanPham = SanPham::orderBy($column,$type)->paginate(5);
        
        }else if($_GET['loai']==1){
            $lstSanPham = SanPham::where('so_luong','<=',5)->orderBy($column,$type)->paginate(5); 
        }else {
            $lstSanPham = SanPham::orderBy($column,$type)->paginate(5);
        }
        foreach ($lstSanPham as $sp) {
            $this->fixImage($sp);
        }
        $all=SanPham::count();
        $outstock=SanPham::where('so_luong','<=',5)->count();
        $lstLoaiSanPham = LoaiSanPham::all();
        return view('Product.Index', ['lstSanPham' => $lstSanPham, 'lstLoaiSanPham' => $lstLoaiSanPham,'all'=>$all,'outstock'=>$outstock]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstLoaiSanPham = LoaiSanPham::all();
        return view('Product.Add', ['lstLoaiSanPham' => $lstLoaiSanPham]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanPham = new SanPham();
        $sanPham->fill([
            'ten_san_pham' => $request->input('ten_san_pham'),
            'mo_ta' => $request->input('mo_ta'),
            'so_luong' => $request->input('so_luong'),
            'don_gia' => $request->input('don_gia'),
            'hinh_anh' => '',
            'loai_san_pham_id' => $request->input('ma_loai'),
        ]);
        $sanPham->save();
        if ($request->hasFile('hinh_anh')) {
            $sanPham->hinh_anh = $request->file('hinh_anh')->store('img/product/' . $sanPham->id, 'public');
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
        $sanPham = SanPham::find($id);
        $lstLoaiSanPham = LoaiSanPham::all();
        $this->fixImage($sanPham);
        return view('Product.Update', ['sanPham' => $sanPham, 'lstLoaiSanPham' => $lstLoaiSanPham]);
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
        $sanPham = SanPham::find($id);
        if ($request->hasFile('hinh_anh')) {
            $sanPham->hinh_anh = $request->file('hinh_anh')->store('img/product/' . $sanPham->id, 'public');
        }
        $sanPham->fill([
            'ten_san_pham' => $request->input('ten_san_pham'),
            'mo_ta' => $request->input('mo_ta'),
            'so_luong' => $request->input('so_luong'),
            'don_gia' => $request->input('don_gia'),
            'loai_san_pham_id' => $request->input('ma_loai'),
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
        $sanPham = SanPham::find($id);
        $sanPham->delete();
        return Redirect::route('product.index');
    }

    public function search()
    {
        
        $tensp= isset($_GET['ten_san_pham'])? $_GET['ten_san_pham']:'';
        $mota= isset($_GET['mo_ta'])? $_GET['mo_ta']:'';
        $giathap=isset($_GET['gia_thap'])&& $_GET['gia_thap']!=null? $_GET['gia_thap']:0;
        $giacao= isset($_GET['gia_cao'])&&$_GET['gia_cao']!=null? $_GET['gia_cao']:SanPham::max('don_gia');
        $maloai=isset($_GET['ma_loai'])&&$_GET['ma_loai']!=null?$_GET['ma_loai']:0;
        if($maloai!=0){
        $lstSanPham = SanPham::where('ten_san_pham', 'like', '%' . $tensp . '%','and')
        ->where('mo_ta', 'like', '%' .  $mota . '%','and')
        ->where('loai_san_pham_id', '=', $_GET['ma_loai'],'and')
        ->where('don_gia', '>=', $giathap,'and')
        ->where('don_gia', '<=', $giacao)
        ->paginate(5);
        }
        else{
            $lstSanPham = SanPham::where('ten_san_pham', 'like', '%' . $tensp . '%','and')
            ->where('mo_ta', 'like', '%' .  $mota . '%','and')
            ->where('don_gia', '>=', $giathap,'and')
            ->where('don_gia', '<=', $giacao)
            ->paginate(5);
        }
        foreach ($lstSanPham as $sp) {
            $this->fixImage($sp);
        }
        
        $lstLoaiSanPham = LoaiSanPham::all();
        
        $pagination = $lstSanPham->appends(array('value' => 'key'));
        return view('Product.Index', ['lstSanPham' => $lstSanPham, 'lstLoaiSanPham' => $lstLoaiSanPham,'pagination' => $pagination]);
    }

}