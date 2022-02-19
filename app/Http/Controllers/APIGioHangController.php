<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\SanPham;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class APIGioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $giohang=new GioHang();
        $soluong=$request->post('_soluongmua');
        $sanpham=SanPham::where('id','=',$request->post('_idsanpham'))->value('so_luong');
        $spgiohang=GioHang::where('id_san_pham','=',$request->post('_idsanpham'),'and')->where('id_khach_hang','=',$request->post('_idkhachhang'))->first();
        if($spgiohang==null){
            if($soluong>$sanpham){
                return 'TooMuch';
             }else{
                $giohang->fill([
                    'id_san_pham'=>$request->post('_idsanpham'),
                    'id_khach_hang'=>$request->post('_idkhachhang'),
                    'so_luong_mua'=>$request->post('_soluongmua'),
                ]);
                $giohang->save();
                return 'Success';
             }
        }else{
            $soluong=$request->post('_soluongmua')+$spgiohang->so_luong_mua;
            if($soluong>$sanpham){
                return 'TooMuch';
             }else{
                $giohang=GioHang::find($spgiohang->id);
                $giohang->fill([
                    'id_san_pham'=>$request->post('_idsanpham'),
                    'id_khach_hang'=>$request->post('_idkhachhang'),
                    'so_luong_mua'=>$soluong,
                ]);
                $giohang->save();
                return  'Success';
             }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giohang=GioHang::select('gio_hangs.id','id_san_pham','so_luong_mua','don_gia','hinh_anh','ten_san_pham')->join('san_phams','san_phams.id','=','gio_hangs.id_san_pham')->where('id_khach_hang','=',$id)->get();
        return json_encode([
            'data'=>$giohang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giohang=GioHang::find($id);
        $giohang->delete();
    }
    public function quanlity(Request $request)
    {
        $giohang=GioHang::find($request->post('_id'));
        $tonkho=SanPham::where('id','=',$giohang->id_san_pham)->value('so_luong');
       if($request->post('_update')==1){
           if($giohang->so_luong_mua==$tonkho){
            $giohang->so_luong_mua=$tonkho;
           }else{
            $giohang->so_luong_mua+=1;
           }
       }else{
        $giohang->so_luong_mua-=1;
       }
       $giohang->save();
        return $giohang->so_luong_mua;
    }

}
