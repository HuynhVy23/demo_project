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
    Route::get('sanphamnoibat',[APISanPhamController::class,'sanphamnoibat']);
});
Route::apiResource('trangThai',APITrangThaiController::class);
Route::apiResource('khachHang',APIKhachHangController::class);
Route::apiResource('gioHang',APIGioHangController::class);
Route::group(['prefix'=>'giohang'],function(){
    Route::post('/',[APIGioHangController::class,'quanlity']);
    Route::post('/doneInvoice',[APIGioHangController::class,'doneInvoice']);
    Route::post('/capNhat',[APIGioHangController::class,'capNhatSoLuong']);
});


Route::post('khachhang/checkEmail',[APIKhachHangController::class,'checkEmail']);
Route::post('khachhang/capNhat',[APIKhachHangController::class,'capNhat']);
Route::post('login',[APIKhachHangController::class,'login']);
Route::get('sp/ds',[APISanPhamController::class,'layds']);

Route::group(['prefix'=>'invoice'],function(){
    Route::get('/getInvoiceList' , [APIHoaDonController::class , 'index']);
Route::post('/newInvoice' , [APIHoaDonController::class , 'store']);
Route::post('/getInvoiceId' , [APIHoaDonController::class , 'getInvoiceId']);
Route::get('/show/{id}' , [APIHoaDonController::class , 'show']);
Route::post('/getListInvoiceByAccountId',  [APIHoaDonController::class , 'getListInvoice']);
Route::get('/huy/{id}' , [APIHoaDonController::class , 'yeucauhuy']);
});

Route::group(['prefix'=>'invoiceDetail'],function(){
    Route::post('/newInvoiceDetail' , [APIChiTietHoaDonController::class ,'store'] );
    Route::post('/show' , [APIChiTietHoaDonController::class ,'show'] );
});
