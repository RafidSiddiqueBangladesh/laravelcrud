<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RightController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', [RightController::class, 'create']);
Route::post('/test', [RightController::class, 'newfile'])->name('test');

Route::get('/test', [RightController::class, 'test']);
Route::get('/edit/{id}', [RightController::class, 'editfile'])->name('edit');
Route::post('/update/{id}', [RightController::class, 'updatefile'])->name('update');
Route::delete('/delete/{id}', [RightController::class, 'deletefile'])->name('delete');