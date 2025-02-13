<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    Route::post('/create', [CategoriesController::class, 'store'])->name('categories.store');
    Route::put('/update/{category}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

Route::group(['prefix' => 'items'], function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index');
    Route::post('/create', [ItemController::class, 'store'])->name('items.store');
    Route::put('/update/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/delete/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
});