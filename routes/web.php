<?php

use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use Spatie\Honeypot\ProtectAgainstSpam;

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

//events
Route::get('/events', [EventController::class,'index'])->name('allEvents');
Route::get('/events/{event}', [EventController::class,'show'])->name('getEvent');
Route::post('/events', [EventController::class,'store'])->middleware(ProtectAgainstSpam::class)->name('events.store');
Route::get('/create-event', function () {
    return view('event-create');
})->name('create-event');

Route::post('/send-email', [ContactController::class,"sendMail"])->middleware(ProtectAgainstSpam::class)->name('contact.send.mail');


Route::get('/donate', function () {
    return view('donate');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes();
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
