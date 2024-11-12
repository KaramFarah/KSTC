<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('cart-item-decrement/{product}/1' , [CartApiController::class , 'quantityDec'])->name('cart.item.decrement');
Route::get('cart-item-increment/{product}/{?amount}' , [CartController::class , 'quantityInc'])->name('cart.item.increment');
    