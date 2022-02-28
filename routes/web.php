<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;

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

//Route::get('/', function () {
//    return view('master');
//});

//For Home Page
Route::get('/', [ ViewController::class, 'index' ])->name('home');


//For Product ADD View Page/Insert Page
Route::get('/add-product', [ ProductController::class, 'index' ])->name('add-product');

//For creating Product
Route::post('/new-product', [ ProductController::class, 'create' ])->name('new-product');

//For Manage Product View
Route::get('/manage-product', [ ProductController::class, 'manage' ])->name('manage-product');

//For Edit Product
Route::get('/edit-product/{id}', [ ProductController::class, 'edit' ])->name('edit-product');

//For Update Product
Route::post('/update-product/{id}', [ ProductController::class, 'update' ])->name('update-product');

//For Delete Product
Route::post('/delete-product/{id}', [ ProductController::class, 'delete' ])->name('delete-product');
