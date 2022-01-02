<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Http\Requests\StoreHoaDonRequest;
use App\Http\Requests\UpdateHoaDonRequest;
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
       $lstHoaDon = HoaDon::all();
       
       return view('Invoice',['lstHoaDon'=>$lstHoaDon]);
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
    public function store(StoreHoaDonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function show(HoaDon $hoaDon)
    {
        $this->fixImage($hoaDon);
        return view('Invoice',['hoaDon'=>$hoaDon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function edit(HoaDon $hoaDon)
    {
        return view('UpdateInvoice',['hoaDon'=>$hoaDon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHoaDonRequest  $request
     * @param  \App\Models\HoaDon  $hoaDon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHoaDonRequest $request, HoaDon $hoaDon)
    {
        $hoaDon->fill([
            'id'=>$request->input('id'),
            'ngay_lap'=>$request->input('ngaylap'),
            'dia_chi'=>$request->input('diachi'),
            'so_dien_thoai'=>$request->input('sodienthoai'),
            'ghi_chu'=>$request->input('ghichu'),
            'tong_tien'=>$request->input('tongtien')
        ]);
        $hoaDon->save();
        return Redirect::route('hoaDon.show',['hoaDon'=>$hoaDon] );
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
