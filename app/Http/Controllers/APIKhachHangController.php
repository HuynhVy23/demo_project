<?php

namespace App\Http\Controllers;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;

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
            'email'=>$request->post('_email'),
            'mat_khau'=>$request->post('_matkhau'),
            'ho_ten'=>$request->post('_hoten'),
            'so_dien_thoai'=>$request->post('_sdt'),
            'dia_chi'=>$request->post('_diachi'),
            'gioi_tinh'=>$request->post('_gioitinh'),
            'ngay_sinh'=>$request->post('_ngaysinh'),
            'hinh_anh'=>'',
        ]);
        if($request->hasFile('_hinhanh')){
            $kh->hinh_anh=$request->file('_hinhanh')->store('img/account/'.$kh->id,'public');
        }
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
    public function show(Request $request)
    {}

    public function checkEmail(Request $request)
    {
        $khachHang=KhachHang::where('email','=',$request->post('_email'))->value('email');
        return json_encode([
            'data'=>$khachHang
        ]);
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

    public function capNhat(Request $request){
        $khachHang = KhachHang::find($request->post('_id'));
        $khachHang->fill([
            'ho_ten'=>$request->post('_hoten'),
            'so_dien_thoai'=>$request->post('_sdt'),
            'dia_chi'=>$request->post('_diachi'),
            'gioi_tinh'=>$request->post('_gioitinh'),
        ]);
        if($khachHang->save()){
            return response()->json([
                'success'=>true
            ]);
        }else{
            return response()->json(['success'=>false]);
        };
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

    public function login(Request $request){
        if($acc = KhachHang::where('email','=',$request->post('_email'))->orwhere('so_dien_thoai','=',$request->post('_email'))->where('mat_khau','=',$request->post('_mat_khau'))->get())
        {
            return json_encode([
                "data"=>$acc
            ]);
        }
        else{
            return 0;
        }
    }
}
