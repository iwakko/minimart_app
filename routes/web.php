<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[ProductController::class,'index'])->name('index');

    #PRODUCT
    Route::get('/product/create',[ProductController::class,'create'])->name('create');
    Route::post('/product/store',[ProductController::class,'store'])->name('store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('edit');
    Route::patch('/product/{id}/update',[ProductController::class,'update'])->name('update');
    Route::delete('/product/{id}/destroy',[ProductController::class,'destroy'])->name('destroy');

    #SECTION
    Route::get('/section',[SectionController::class,'index'])->name('section.index');
    Route::post('/section/store',[SectionController::class,'store'])->name('section.store');
    Route::delete('/section/{id}/destroy',[SectionController::class,'destroy'])->name('section.destroy');
    

});



