<?php

use App\Http\Controllers\APIKhachHangController;
use App\Http\Controllers\APILoaiSanPhamController;
use App\Http\Controllers\APISanPhamController;
use App\Http\Controllers\APITrangThaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('trangThai',APITrangThaiController::class);
Route::apiResource('khachHang',APIKhachHangController::class);
