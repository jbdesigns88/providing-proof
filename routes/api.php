<?php


use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', [PaymentController::class,"createPayment"]);
Route::post('/payment', [PaymentController::class,"createPayment"]);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
