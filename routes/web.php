<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CkeckController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MassageController;
use App\Http\Controllers\MyProfileControler;
use App\Http\Controllers\OrderController as OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/home',[HomeController::class,'home'])->name('home');

//Route::get('/',[ProductController::class,'product'])->name('product');
Route::get('/product', [ProductController::class, 'product'])->name('product');

Route::post('/store',[OrderController::class, 'store'])->name('store');

//Route::get('/check',[OrderController::class, 'order_check'])->name('order_check');

Route::get('/check',[CkeckController::class, 'check'])->name('check');




Route::post('/massage',[MassageController::class, 'massage'])->name('massage');

Route::post('/search_page',[SearchController::class, 'searchByProduct'])->name('search_page');

Route::get('/contact',[ContactController::class,'contact'])->name('contact');

Route::get('/filter-products', [ProductController::class, 'filter'])->name('filter.products');


Route::get('register',[AuthController::class, 'getRegister'])->name('getRegister');

Route::post('register',[AuthController::class, 'register'])->name('register');

Route::post('/login',[AuthController::class, 'getLogin'])->name('login_data');

Route::get('/login',[AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/profile', [MyProfileControler::class, 'profile'])->name('profile');

Route::get('/edit', [MyProfileControler::class, 'edit'])->name('edit');

Route::post('/update_profile', [MyProfileControler::class, 'update'])->name('update_profile');

Route::post('/delete/{id}', [OrderController::class, 'destroy'])->name('delete');


//Route::get('/profile', [MyProfileControler::class, 'profile'])->middleware('auth')->name('profile');;






