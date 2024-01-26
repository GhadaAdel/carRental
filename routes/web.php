<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->controller(MainController::class)->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('about', 'about')->name('about');
    Route::get('blog', 'blog')->name('blog');
    Route::get('contact', 'contact')->name('contact');
    Route::get('carList', 'carList')->name('carList');
    Route::get('main', 'main')->name('main');
    Route::get('single/{id}', 'single')->name('single');
    Route::get('testimonials', 'testimonials')->name('WebTestimonials');
});

Route::prefix('/')->controller(ContactController::class)->group(function(){
    Route::post('submit', 'sendEmail')->name('submit');
    Route::get('Notification/markAsRead', 'markAsRead')->name('readNotification');
});
    

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

