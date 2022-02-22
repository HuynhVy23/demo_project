<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class APISanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstSanPham=SanPham::all();
        return json_encode([
            'data'=>$lstSanPham
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lstSanPham=SanPham::where('loai_san_pham_id','=',$id)->get();
        return $lstSanPham;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function trangchu()
    {
        $lstSanPham=SanPham::orderByDesc('so_luong')->take(4)->get();
        return $lstSanPham;
    }

    public function sanphammoi()
    {
        $lstSanPham=SanPham::orderByDesc('created_at')->take(6)->get();
        return $lstSanPham;
    }

    public function sanphambanchay()
    {
        $lstSanPham=SanPham::join('c_t__hoa_dons','c_t__hoa_dons.id_san_pham','=','san_phams.id')
        ->selectRaw('san_phams.id,ten_san_pham,mo_ta,so_luong,don_gia,hinh_anh,loai_san_pham_id,sum(so_luong_ct) as ct')
        ->groupBy('san_phams.id','ten_san_pham','mo_ta','so_luong','don_gia','hinh_anh','loai_san_pham_id')->orderByDesc('so_luong_ct')->take(6)->get();
        return $lstSanPham;
    }

    public function sanphamnoibat(){
        $lstSanPham=SanPham::orderByDesc('so_luong')->take(6)->get();
        return $lstSanPham;
    }
}
