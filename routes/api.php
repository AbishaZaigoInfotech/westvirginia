<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PromoController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('stations', StationController::class);
Route::resource('categories', CategoryController::class);
Route::resource('promos', PromoController::class);
Route::get('/notify',[App\Http\Controllers\API\NotificationController::class, 'pushNotification']);
Route::post('/device',[App\Http\Controllers\API\NotificationController::class, 'store']);