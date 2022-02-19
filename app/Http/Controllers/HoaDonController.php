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
            $lstHoaDon = HoaDon::where('loai_hd','=',$_GET['loaihd'])->paginate(10);
        }else{
            $lstHoaDon = HoaDon::where('loai_hd','=',0)->paginate(10);
        }
        $pending=HoaDon::where('loai_hd','=',0)->count();
        $toship=HoaDon::where('loai_hd','=',1)->count();
        $toreceive=HoaDon::where('loai_hd','=',2)->count();
        $complete=HoaDon::where('loai_hd','=',3)->count();
        $cancel=HoaDon::where('loai_hd','=',5)->count();
        $canceled=HoaDon::where('loai_hd','=',4)->count();
        return view('Invoice.Invoice',['lstHoaDon'=>$lstHoaDon,'pending'=>$pending,'toship'=>$toship,'toreceive'=>$toreceive,'complete'=>$complete,'cancel'=>$cancel,'canceled'=>$canceled]);
    }

    public function hoadonnhap()
    {
        $lstHoaDon = HoaDon::where('loai_hd','=',6)->paginate(10);
        return view('Receipt.Receipt',['lstHoaDon'=>$lstHoaDon]);
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
      $cthoadon=CT_HoaDon::join('san_phams','san_phams.id','=','c_t__hoa_dons.id_san_pham')->join('hoa_dons','hoa_dons.id','=','c_t__hoa_dons.id_hoa_don')->where('id_hoa_don','=',$id)->get();
      return view('Invoice.InvoiceDetail',['cthoadon'=>$cthoadon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hoadon=HoaDon::find($id);
        if($hoadon->loai_hd==5){
            $hoadon->loai_hd=4;
            $hoadon->save();
            return Redirect::route('invoice.index');
        }else{
            $hoadon->loai_hd+=1;
            $hoadon->save();
            return redirect()->back();
        }
        
        
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


    public function huy($id)
    {
        $hoadon=HoaDon::find($id);
        $hoadon->loai_hd=0;
        $hoadon->save();
        return Redirect::route('invoice.index');
    }

    public function timkiem()
    {
        $hoadon=HoaDon::where('email','like','%'.$_GET['key'].'%')
        ->orwhere('ngay_lap','=',$_GET['key'])
        ->orwhere('dia_chi','like','%'.$_GET['key'].'%')
        ->orwhere('so_dien_thoai','=',$_GET['key'])->paginate(10);

        $pending=HoaDon::where('loai_hd','=',0)->count();
        $toship=HoaDon::where('loai_hd','=',1)->count();
        $toreceive=HoaDon::where('loai_hd','=',2)->count();
        $complete=HoaDon::where('loai_hd','=',3)->count();
        $cancel=HoaDon::where('loai_hd','=',5)->count();
        $canceled=HoaDon::where('loai_hd','=',4)->count();
        return view('Invoice.Invoice',['lstHoaDon'=>$hoadon,'pending'=>$pending,'toship'=>$toship,'toreceive'=>$toreceive,'complete'=>$complete,'cancel'=>$cancel,'canceled'=>$canceled]);

    }
}
