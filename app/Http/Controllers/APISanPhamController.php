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
        $lstSanPham=SanPham::orderByDesc('created_at')->take(10)->get();
        return $lstSanPham;
    }

    public function sanphambanchay()
    {
        $lstSanPham=SanPham::orderByDesc('created_at')->take(10)->get();
        return $lstSanPham;
    }

    public function layds(){
        $ds = SanPham::all();
        if(!empty($ds)){
            return response()->json($ds,200);
        }
        return response()->json($ds,["Error"=>"Item Not Found"],404);
    }
}
