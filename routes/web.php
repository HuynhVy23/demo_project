<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\Catagory;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::group(['prefix'=>'invoice'],function(){
    // Route::get('/', function () {
    //     return view('Invoice');
    // })->name('Invoice');
    Route::get('/',[HoaDonController::class,'index'])->name('Invoice');
    Route::get('/update',[HoaDonController::class,'edit'])->name('UpdateInvoice');
    Route::post('/edit',[HoaDonController::class,'update'])->name('hoaDon');
    // Route::get('/update', function () {
    //     return view('UpdateInvoice');
    // })->name('UpdateInvoice');
    Route::get('/detail', function () {
        return view('InvoiceDetail');
    })->name('InvoiceDetail');
});

Route::resource('product', SanPhamController::class)->except('show');

Route::resource('catagory', LoaiSanPhamController::class)->except('show');

Route::resource('account', KhachHangController::class)->only(['index','create','store','edit','update','destroy']);

Route::group(['prefix'=>'comment'],function(){
    Route::get('/', function () {
        return view('Comment');
    })->name('Comment');
});

