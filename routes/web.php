<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [NavigationController::class,'index']);



Route::get('/our-curriculum', function () {
    return view('about');
});

Route::get('/events', function () {
    return view('events');
});
Route::post('/send-email', [ContactController::class,"sendMail"])->name('contact.send.mail');


Route::get('/donate', function () {
    return view('donate');
});

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
