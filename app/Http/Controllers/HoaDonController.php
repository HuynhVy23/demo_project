<?php

namespace App\Http\Controllers;

use App\Models\CT_HoaDon;
use App\Models\HoaDon;
use App\Models\CTHoaDonController;
use Carbon\Carbon;
use App\Models\SanPham;
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
            $lstHoaDon = HoaDon::where('loai_hd','=',$_GET['loaihd'],'and')->where('nhap','=',0)->paginate(10);
        }else{
            $lstHoaDon = HoaDon::where('loai_hd','=',0,'and')->where('nhap','=',0)->paginate(10);
        }
        $pending=HoaDon::where('loai_hd','=',0,'and')->where('nhap','=',0)->count();
        $toship=HoaDon::where('loai_hd','=',1,'and')->where('nhap','=',0)->count();
        $toreceive=HoaDon::where('loai_hd','=',2,'and')->where('nhap','=',0)->count();
        $complete=HoaDon::where('loai_hd','=',3,'and')->where('nhap','=',0)->count();
        $cancel=HoaDon::where('loai_hd','=',5,'and')->where('nhap','=',0)->count();
        $canceled=HoaDon::where('loai_hd','=',4,'and')->where('nhap','=',0)->count();
        return view('Invoice.Invoice',['lstHoaDon'=>$lstHoaDon,'pending'=>$pending,'toship'=>$toship,'toreceive'=>$toreceive,'complete'=>$complete,'cancel'=>$cancel,'canceled'=>$canceled]);
    }

    public function hoadonnhap()
    {
        $lstHoaDon = HoaDon::where('nhap','=',1)->paginate(10);
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

        for ($i=0; $i <= count($hoadon); $i++) { 
            if($hoadon[$i]->nhap==1){
               unset($hoadon[$i]);
            }
        }

        $pending=HoaDon::where('loai_hd','=',0,'and')->where('nhap','=',0)->count();
        $toship=HoaDon::where('loai_hd','=',1,'and')->where('nhap','=',0)->count();
        $toreceive=HoaDon::where('loai_hd','=',2,'and')->where('nhap','=',0)->count();
        $complete=HoaDon::where('loai_hd','=',3,'and')->where('nhap','=',0)->count();
        $cancel=HoaDon::where('loai_hd','=',5,'and')->where('nhap','=',0)->count();
        $canceled=HoaDon::where('loai_hd','=',4,'and')->where('nhap','=',0)->count();
        return view('Invoice.Invoice',['lstHoaDon'=>$hoadon,'pending'=>$pending,'toship'=>$toship,'toreceive'=>$toreceive,'complete'=>$complete,'cancel'=>$cancel,'canceled'=>$canceled]);

    }

    public function themhdnhap()
    {
        $sanpham=SanPham::all();
        return view('Receipt.AddReceipt',['sanpham'=>$sanpham]);
    }

    public function xulihdnhap(Request $request)
    {
        if($request->so_luong==null||$request->don_gia==null){
            $error='Please enter price and quanlity';
            $sanpham=SanPham::all();
        return view('Receipt.AddReceipt',['sanpham'=>$sanpham,'error'=>$error]);
        }elseif($request->so_luong==0||$request->don_gia==0){
            $error='Price and quanlity must be greater than 0';
            $sanpham=SanPham::all();
        return view('Receipt.AddReceipt',['sanpham'=>$sanpham,'error'=>$error]);
        }
        $year =  Carbon::now('Asia/Ho_Chi_Minh')->year;
        $month = (int)Carbon::now('Asia/Ho_Chi_Minh')->month;
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
        if( $month < 10) 
        {
            $month = '0'.$month;
        }
        $day = (int)Carbon::now('Asia/Ho_Chi_Minh')->day;
        
        if($day < 10)
        {
            $day = '0'.$day;
        }
        $id = $year.$month.$day.$hour.$minute.$second;
        $tongtien=$request->so_luong*$request->don_gia;
        $HoaDon = new HoaDon;
        $HoaDon->fill([
         'id' => $id,
         'email' => 'ADMIN',
         'ngay_lap' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
         'dia_chi' => 'ADMIN',
         'so_dien_thoai' => 'ADMIN',
         'tong_tien' => $tongtien,
         'loai_hd'=>3,
         'nhap'=>1
        ]);
        $HoaDon->save();

        $cthd=new CT_HoaDon();
        $cthd->fill([
            'id_hoa_don'=>$id,
            'id_san_pham'=>$request->id_san_pham,
            'so_luong_ct'=>$request->so_luong,
            'don_gia_ct'=>$request->don_gia,
            'tong'=>$tongtien
        ]);
        $cthd->save();

        $sanpham=SanPham::find($request->id_san_pham);
        $sanpham->so_luong+=$request->so_luong;
        $sanpham->save();
        return Redirect::route('Receipt');
    }

    public function chitietnhap($id){
        $cthoadon=CT_HoaDon::join('san_phams','san_phams.id','=','c_t__hoa_dons.id_san_pham')->join('hoa_dons','hoa_dons.id','=','c_t__hoa_dons.id_hoa_don')->where('id_hoa_don','=',$id)->get();
        return view('Receipt.show',['cthoadon'=>$cthoadon]);
    }
}
