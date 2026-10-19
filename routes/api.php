<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PayTrackController;
use App\Http\Controllers\PayTrackAuthController;
Route::get('/health/live',fn()=>response()->json(['status'=>'alive']));
Route::get('/health/ready',[PayTrackController::class,'health']);
Route::prefix('v1')->group(function(){
 Route::post('/auth/register',[PayTrackController::class,'register']);
 Route::post('/customers',[PayTrackController::class,'createCustomer']);
 Route::post('/auth/login',[PayTrackAuthController::class,'login']);
 Route::post('/auth/refresh',[PayTrackAuthController::class,'refresh']);
 Route::middleware('training.token')->group(function(){
  Route::get('/customers/{id}',[PayTrackController::class,'customer']);
  Route::get('/wallets/{id}',[PayTrackController::class,'wallet']);
  Route::get('/wallets/{id}/transactions',[PayTrackController::class,'ledger']);
  Route::post('/transfers',[PayTrackController::class,'transfer']);
  Route::post('/admin/refunds',[PayTrackController::class,'refunds']);
 });
});
