<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Carbon\Carbon;
use LengthException;

class APIHoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getListInvoice (Request $request){
        $HoaDon = HoaDon::join('c_t__hoa_dons' , 'c_t__hoa_dons.id_hoa_don' , '=' , 'hoa_dons.id')->join('san_phams' , 'san_phams.id' ,'=' , 'c_t__hoa_dons.id_san_pham')
        ->where('email' , '=' , $request->post('email'))->select('hoa_dons.id', 'hoa_dons.tong_tien', 'hoa_dons.email' , 'c_t__hoa_dons.*' , 'san_phams.ten_san_pham' , 'san_phams.hinh_anh' )->get();
        
        return json_encode ([
            'data' => $HoaDon,
        ]);
    }
    public function getInvoiceId (Request $request)
    {
        $HoaDonId = HoaDon::with('id')->where('email' , '=' , $request->post('email'))->max('id');
        
        return json_encode([
            'id' => $HoaDonId,
            
        ]);
    }
    public function index()
    {
        $HoaDon = HoaDon::join('c_t__hoa_dons' , 'c_t__hoa_dons.id_hoa_don' , '=' , 'hoa_dons.id')->get();
        
        return json_encode ([
            'data' => $HoaDon,
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
        $year =  Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = (int)Carbon::now('Asia/Ho_Chi_Minh')->month;
        
        if( $month < 10) 
        {
            $month = '0'.$month;
        }
        $day = (int)Carbon::now('Asia/Ho_Chi_Minh')->day;
        
        if($day < 10)
        {
            $day = '0'.$day;
        }
        $hour = Carbon::now('Asia/Ho_Chi_Minh')->hour;
        
        if( $hour < 10) 
        {
            $hour = '0'.$hour;
        }
        $minute = Carbon::now('Asia/Ho_Chi_Minh')->minute;
        
        if( $minute < 10) 
        {
            $minute = '0'.$minute;
        }
        $second = Carbon::now('Asia/Ho_Chi_Minh')->second;
        
        if( $second < 10) 
        {
            $second = '0'.$second;
        }
        $id = $year.$month.$day.$hour.$minute.$second;
        $HoaDon = new HoaDon;
        $HoaDon->fill([
         'id' => $id,
         'email' => $request->post('email'),
         'ngay_lap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
         'dia_chi' => $request->post('_dia_chi'),
         'so_dien_thoai' => $request->post('_so_dien_thoai'),
         'tong_tien' => $request->post('_tong_tien'),
        ]);
        $HoaDon->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lstHoaDon=HoaDon::where('email','=',$id)->get();
        $lstSanPham=array ([]);
        for ($i=0; $i < $lstHoaDon->count(); $i++) { 
            $a=HoaDon::select('hoa_dons.id','email','ngay_lap','dia_chi','so_dien_thoai','tong_tien','loai_hd','ten_san_pham','so_luong_ct','don_gia_ct','hinh_anh')
            ->join('c_t__hoa_dons','c_t__hoa_dons.id_hoa_don','=','hoa_dons.id')
            ->join('san_phams','san_phams.id','=','c_t__hoa_dons.id_san_pham')
            ->where('hoa_dons.id','=',$lstHoaDon[$i]->id)->first();
            $lstSanPham[$i]=$a;
        }
        
        return json_encode([
            'data'=>$lstSanPham
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
    public function yeucauhuy($id)
    {
        $hoadon=HoaDon::find($id);
        $hoadon->loai_hd=5;
        $hoadon->save();
    }

}