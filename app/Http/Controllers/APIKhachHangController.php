<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class APIKhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstKhachHang = KhachHang::all();
        return $lstKhachHang;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kh=new KhachHang();
        $kh->fill([
            'ten_dang_nhap'=>$request->post('_tendangnhap'),
            'email'=>$request->post('_email'),
            'mat_khau'=>$request->post('_matkhau'),
            'ho_ten'=>$request->post('_hoten'),
            'so_dien_thoai'=>$request->post('_sdt'),
            'dia_chi'=>$request->post('_diachi'),
            'hinh_anh'=>'',
        ]);
        if($kh->save()){
            return response()->json([
                'success'=>true
            ]);
        }else{
return response()->json(['success'=>false]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ten_dang_nhap)
    {
        $lstKhachHang=KhachHang::where('ten_dang_nhap','=',$ten_dang_nhap)->get();
        return $lstKhachHang;
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
}
