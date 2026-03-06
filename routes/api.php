<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/tasks',[TaskController::class,'index']);
    Route::post('/tasks',[TaskController::class,'store']);
    Route::get('/tasks/{id}',[TaskController::class,'show']);
    Route::put('/tasks/{id}',[TaskController::class,'update']);
    Route::delete('/tasks/{id}',[TaskController::class,'destroy']);
    Route::patch('/tasks/{id}/complete',[TaskController::class,'complete']);
});
