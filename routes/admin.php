<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;

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

Auth::routes(['verify'=>true]);

Route::prefix('admin')->middleware('verified')->controller(CarController::class)->group(function(){
    Route::get('cars', 'index')->name('cars');
    Route::post('addcar', 'store')->name('addcar');
    Route::get('addcar', 'create')->name('form');
    Route::get('editcar/{id}', 'edit');
    Route::put('updatecar/{id}', 'update')->name('editCar');
    Route::get('deletecar/{id}', 'destroy');
    Route::get('categories', 'index')->name('categories');
    Route::post('addcat', 'store')->name('addcat');
    Route::get('addcat', 'create')->name('catForm');
    Route::get('main', 'main')->name('main');
    Route::get('testimonials', 'testimonials')->name('testimonials');
});

Route::prefix('admin')->middleware('verified')->controller(CategoryController::class)->group(function(){
    Route::get('categories', 'index')->name('categories');
    Route::post('addcat', 'store')->name('addcat');
    Route::get('addcat', 'create')->name('catForm');
    Route::get('editcat/{id}', 'edit');
    Route::put('updatecat/{id}', 'update')->name('editCat');
    Route::get('deletecat/{id}', 'destroy');
});

Route::prefix('admin')->middleware('verified')->controller(UserController::class)->group(function(){
    Route::get('users', 'index')->name('users');
    Route::post('addUser', 'store')->name('addUser');
    Route::get('addUser', 'create')->name('userForm');
    Route::get('editUser/{id}', 'edit');
    Route::put('updateUser/{id}', 'update')->name('editUser');
    Route::get('deleteUser/{id}', 'destroy');
});

Route::prefix('admin')->middleware('verified')->controller(TestimonialController::class)->group(function(){
    Route::get('testimonials', 'index')->name('testimonials');
    Route::post('addTestimonial', 'store')->name('addTestimonial');
    Route::get('addTestimonial', 'create')->name('testimonialForm');
    Route::get('editTestimonial/{id}', 'edit');
    Route::put('updateTestimonial/{id}', 'update')->name('editTestimonial');
    Route::get('deleteTestimonial/{id}', 'destroy');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('verified')->controller(ContactController::class)->group(function(){
    Route::get('message', 'index')->name('messagesList');
    Route::get('showMessage/{id}', 'show')->name('showMessage');
    Route::get('unread', 'getUnreadMessages');
});

