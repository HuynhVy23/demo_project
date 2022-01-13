<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class KhachHangController extends Controller
{
    protected function fixImage(KhachHang $khachHang){
        if(Storage::disk('public')->exists($khachHang->hinh_anh)){
            $khachHang->hinh_anh = Storage::url($khachHang->hinh_anh);
        }else{
            $khachHang->hinh_anh = '/images/account/1.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstKhachHang=KhachHang::all();
        foreach($lstKhachHang as $kh){
            $this->fixImage($kh);
        }
        return view('Account.Index',['lstKhachHang'=>$lstKhachHang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstKhachHang = KhachHang::all();
        return view('Account.Add')->with('lstKhachHang',$lstKhachHang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khachHang = new KhachHang;
        $khachHang->fill([
            'ten_dang_nhap' => $request->input('Username'),
            'mat_khau' => $request->input('MatKhau'),
            'ho_ten' => $request->input('HoTen'),
            'so_dien_thoai' => $request->input('DienThoai'),
            'email' => $request->input('Email'),
            'dia_chi' => $request->input('DiaChi'),
            'hinh_anh' =>'',
        ]);
        $khachHang->save();
        if($request->hasFile('HinhAnh')){
            $khachHang->hinh_anh = $request->file('HinhAnh')->store('img/account/'.$khachHang->id,'public');
        }
        $khachHang->save();
        return Redirect::route('account.index',['khachHang'=>$khachHang]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show(KhachHang $khachHang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachHang=KhachHang::find($id);
        $this->fixImage($khachHang);
        
        return view('Account.Update',['khachHang'=>$khachHang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $khachHang=KhachHang::find($id);

        if($request->hasFile('HinhAnh')){
            $khachHang->hinh_anh = $request->file('HinhAnh')->store('img/account/'.$khachHang->id,'public');
        }
        else{
            $khachHang->hinh_anh ='error';
        }
        
        $khachHang->fill([
            'ten_dang_nhap' => $request->input('Username'),
            'mat_khau' => $request->input('MatKhau'),
            'ho_ten' => $request->input('HoTen'),
            'so_dien_thoai' => $request->input('DienThoai'),
            'email' => $request->input('Email'),
            'dia_chi' => $request->input('DiaChi'),
        ]);
        $khachHang->save();
        
        
        return Redirect::route('account.index',['khachHang'=>$khachHang]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhachHang $khachHang)
    {
        $khachHang->delete();
        return Redirect::route('account.index');
    }
}
