<?php

namespace App\Http\Controllers;

use App\Models\CT_HoaDon;
use App\Models\HoaDon;
use App\Models\CTHoaDonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\SoftDeletes;


class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['loaihd'])&&$_GET['loaihd']!=null){
            $lstHoaDon = HoaDon::where('loai_hd','=',$_GET['loaihd'],'and')->where('huy','=',0)->get();
        }else if(isset($_GET['huy'])&&$_GET['huy']!=null){
            $lstHoaDon = HoaDon::where('huy','=',1)->get();
        }else{
            $lstHoaDon = HoaDon::where('loai_hd','=',0)->get();
        }
        $pending=HoaDon::where('loai_hd','=',0,'and')->where('huy','=',0)->count();
        $toship=HoaDon::where('loai_hd','=',1,'and')->where('huy','=',0)->count();
        $toreceive=HoaDon::where('loai_hd','=',2,'and')->where('huy','=',0)->count();
        $complete=HoaDon::where('loai_hd','=',3,'and')->where('huy','=',0)->count();
        $cancel=HoaDon::where('huy','=',1)->count();
        return view('Invoice.Invoice',['lstHoaDon'=>$lstHoaDon,'pending'=>$pending,'toship'=>$toship,'toreceive'=>$toreceive,'complete'=>$complete,'cancel'=>$cancel]);
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
     * @param  \App\Http\Requests\StoreHoaDonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cthoadon=CT_HoaDon::select('tong','so_luong','ten_san_pham','don_gia','hinh_anh')->join('san_phams','san_phams.id','=','c_t__hoa_dons.id_san_pham')->where('id_hoa_don','=',$id)->get();
      return view('Invoice.InvoiceDetail',['cthoadon'=>$cthoadon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDon $hoaDon)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HoaDon $hoaDon)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HoaDon $hoaDon)
    {
        //
    }
}
