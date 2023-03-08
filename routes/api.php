<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'api','prefix'=>'auth'],function($router){
    Route::post('/login',[AdminController::class,'login']);
   
    Route::post('/register',[AdminController::class,'register']);
});



//customers apis crud

Route::post('/user',[CustomerController::class,'create']);
Route::get('/alluser',[CustomerController::class,'show']);
Route::get('/user/{id}',[CustomerController::class,'showbyid']);
Route::put('/userupdate/{id}',[CustomerController::class,'updatebyid']);
Route::delete('/userdelete/{id}',[CustomerController::class,'deletebyid']);
    
        Route::post('/userlogin',[CustomerController::class,'customerlogin']);

//vehicle apis crud
Route::post('/vehicle',[VehicleController::class,'create']);
Route::get('/show',[VehicleController::class,'show']);
Route::get('/showstatus',[VehicleController::class,'showStatus']);
Route::get('/show/{id}',[VehicleController::class,'showbyid']);
Route::put('/vehicleupdate/{id}',[VehicleController::class,'updatebyid']);
Route::delete('/vehicledelete/{id}',[VehicleController::class,'deletebyid']);

//Driver apis crud
Route::post('/driver',[DriverController::class,'create']);
Route::get('/driver',[DriverController::class,'show']);
Route::get('/driver/{id}',[DriverController::class,'showbyid']);
Route::put('/driverupdate/{id}',[DriverController::class,'updatebyid']);
Route::delete('/driverdelete/{id}',[DriverController::class,'deletebyid']);

//booking 
Route::post('/booking',[BookingController::class,'create'])->name('booking');
Route::get('/allbooking',[BookingController::class,'showbooking']);
Route::get('/bookingby/{id}',[BookingController::class,'showbyid']);
Route::put('/bookingupdate/{id}',[BookingController::class,'updatebyid']);
Route::delete('/bookingdelete/{id}',[BookingController::class,'deletebyid']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
