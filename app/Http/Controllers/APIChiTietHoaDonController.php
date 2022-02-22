<?php

namespace App\Http\Controllers;

use App\Models\CT_HoaDon;
use Illuminate\Http\Request;

class APIChiTietHoaDonController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cthd = new CT_HoaDon;
        $cthd->fill([
            'id_hoa_don' => $request->post('_id'),
            'id_san_pham' => $request->post('_id_san_pham'),
            'so_luong' => $request->post('_so_luong'),
            'don_gia' => $request->post('_don_gia'),
            'tong' => $request->post('_tong'),
        ]);
        $cthd->save();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cthd=CT_HoaDon::select('ten_san_pham','hinh_anh','so_luong_ct','don_gia_ct')
        ->join('san_phams','san_phams.id','=','c_t__hoa_dons.id_san_pham')
        ->where('id_hoa_don','=',$request->post('_id_hoa_don'))->get();
        return json_encode([
            'data'=>$cthd,
            'post'=>$request->post('_id_hoa_don')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice_detail  $invoice_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}