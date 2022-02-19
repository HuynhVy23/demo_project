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
})->name('Index');

Route::resource('invoice', HoaDonController::class);
Route::group(['prefix'=>'Invoice'],function(){
    Route::get('/huy/{id}',[ HoaDonController::class,'huy'])->name('Cancel');

    Route::get('/search',[HoaDonController::class,'timkiem'])->name('SearchInvoice');
});

Route::group(['prefix'=>'receipt'],function(){
    Route::get('/',[ HoaDonController::class,'hoadonnhap'])->name('Receipt');

    Route::get('/search',[HoaDonController::class,'timkiem'])->name('SearchInvoice');
});

Route::resource('product', SanPhamController::class)->except('show');
Route::group(['prefix'=>'product'],function(){
    Route::get('/search',[SanPhamController::class,'search'])->name('SearchProduct');
});

Route::resource('catagory', LoaiSanPhamController::class)->except('show');
Route::group(['prefix'=>'catagory'],function(){
    Route::post('/search',[LoaiSanPhamController::class,'search'])->name('SearchCategory');
});


Route::resource('account', KhachHangController::class)->only(['index','create','store','edit','update','destroy']);
Route::group(['prefix'=>'account'],function(){
    Route::get('/search',[KhachHangController::class,'search'])->name('SearchAccount');
});

Route::group(['prefix'=>'comment'],function(){
    Route::get('/', function () {
        return view('Comment');
    })->name('Comment');
});

