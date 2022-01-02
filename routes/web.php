<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoaDonController;

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
        return view('Product');
    })->name('Product');
    Route::get('/add', function () {
        return view('AddProduct');
    })->name('AddProduct');
    Route::get('/update', function () {
        return view('UpdateProduct');
    })->name('UpdateProduct');
});

Route::group(['prefix'=>'catagory'],function(){
    Route::get('/', function () {
        return view('Catagory');
    })->name('Catagory');
    Route::get('/update', function () {
        return view('UpdateCatagory');
    })->name('UpdateCatagory');
    Route::get('/add', function () {
        return view('AddCatagory');
    })->name('AddCatagory');


});Route::group(['prefix'=>'Account'],function(){
    Route::get('/', function () {
        return view('Account');
    })->name('Account');
    Route::get('/update', function () {
        return view('UpdateAccount');
    })->name('UpdateAccount');
    Route::get('/add', function () {
        return view('AddAccount');
    })->name('AddAccount');
});

Route::group(['prefix'=>'comment'],function(){
    Route::get('/', function () {
        return view('Comment');
    })->name('Comment');
});