<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\Catagory;

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

Route::group(['prefix'=>'product'],function(){
    Route::get('/', function () {
        return view('Product.Show');
    })->name('Product');
    Route::get('/add', function () {
        return view('Product.Add');
    })->name('AddProduct');
    Route::get('/update', function () {
        return view('Product.Update');
    })->name('UpdateProduct');
});

Route::group(['prefix'=>'catagory'],function(){
    Route::get('/',[Catagory::class,'show'])->name('Catagory');
    Route::get('/update',[Catagory::class,'edit','loaiSanPham'])->name('UpdateCatagory');
    Route::get('/add',[Catagory::class,'create'])->name('AddCatagory');
    Route::post('adddata',[Catagory::class,'store'])->name('InsertCatagory') ;
    Route::post('updatedata',[Catagory::class,'update'])->name('UpCatagory') ;



});Route::group(['prefix'=>'Account'],function(){
    Route::get('/', function () {
        return view('Account.show');
    })->name('Account');
    Route::get('/update', function () {
        return view('Account.Update');
    })->name('UpdateAccount');
    Route::get('/add', function () {
        return view('Account.Add');
    })->name('AddAccount');
});

Route::group(['prefix'=>'comment'],function(){
    Route::get('/', function () {
        return view('Comment');
    })->name('Comment');
});

