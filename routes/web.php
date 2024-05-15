<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [FrontedController::class, 'index']);
Route::get('product/details/{product_id}', [FrontedController::class, 'productdetails']);
Route::get('about', [FrontedController::class, 'about']);

Route::get('contact', [FrontedController::class, 'contact']);
Route::post('contact/post', [FrontedController::class, 'contactpost']);

Route::get('team', [FrontedController::class, 'team']);
Route::get('services', [FrontedController::class, 'services']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/messages', [HomeController::class, 'messages']);
Route::get('/delete/message/{id}', [HomeController::class, 'deletemessage']);
Route::get('/read/message/{id}', [HomeController::class, 'readmessage']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::POST('/change/name', [HomeController::class, 'changename']);
Route::POST('/change/password', [HomeController::class, 'changepassword']);
Route::POST('/change/photo', [HomeController::class, 'changephoto']);


Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/delete/category/{id}', [CategoryController::class, 'deletecategory']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);

Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/insert', [ProductController::class, 'insert']);
