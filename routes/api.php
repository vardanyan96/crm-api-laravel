<?php

use App\Http\Controllers\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
   // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('auth:api')->group(function (){
        Route::get('/auth/user', [AuthController::class, 'me']);

        Route::group([
            'prefix' => 'cards',
            'as' => 'cards.'
        ],function (){
            Route::get('/',[\App\Http\Controllers\V1\CardController::class,'list']);
            Route::post('/',[\App\Http\Controllers\V1\CardController::class,'store']);
            Route::put('/{id}',[\App\Http\Controllers\V1\CardController::class,'update']);
            Route::delete('/{id}',[\App\Http\Controllers\V1\CardController::class,'destroy']);
        });

    });



});
