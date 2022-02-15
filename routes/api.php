<?php

use App\Http\Controllers\APIGioHangController;
use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APITrangThaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIHoaDonController;
use App\Http\Controllers\APIChiTietHoaDonController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('loaiSanPham',APILoaiSanPhamController::class);
Route::apiResource('sanPham',APISanPhamController::class);
Route::group(['prefix'=>'sanpham'],function(){
    Route::get('trangchu',[APISanPhamController::class,'trangchu']);
    Route::get('sanphammoi',[APISanPhamController::class,'sanphammoi']);
    Route::get('sanphambanchay',[APISanPhamController::class,'sanphambanchay']);
});
Route::apiResource('trangThai',APITrangThaiController::class);
Route::apiResource('khachHang',APIKhachHangController::class);
Route::apiResource('gioHang',APIGioHangController::class);
Route::post('khachhang/checkEmail',[APIKhachHangController::class,'checkEmail']);
Route::get('sp/ds',[APISanPhamController::class,'layds']);
Route::post('login',[APIKhachHangController::class,'login']);

Route::get('invoice/getInvoiceList' , [APIHoaDonController::class , 'index']);
Route::post('invoice/newInvoice' , [APIHoaDonController::class , 'store']);
Route::post('invoice/getInvoiceId' , [APIHoaDonController::class , 'getInvoiceId']);
Route::post('invoiceDetail/newInvoiceDetail' , [APIChiTietHoaDonController::class ,'store'] );
Route::post('invoice/getListInvoiceByAccountId',  [APIHoaDonController::class , 'getListInvoice']);