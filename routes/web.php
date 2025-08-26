<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\PlatformInfoController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'home']);

Route::get('/platform/create', [PlatformController::class, 'create'])->name('platform.create');
Route::post('/platform/store', [PlatformController::class, 'store'])->name('platform.store');

Route::get('/platform/select', [PlatformController::class, 'select'])->name('platform.select');
Route::get('/platform/{id}', [PlatformController::class, 'show'])->name('platform.show');

Route::delete('/platforms/{platform}', [PlatformController::class, 'destroy'])->name('platform.destroy');


Route::get('/platform-infos', [PlatformInfoController::class, 'index'])->name('platform-info.index');
Route::get('/platform-infos/create', [PlatformInfoController::class, 'create'])->name('platform-info.create');
Route::post('/platform-infos', [PlatformInfoController::class, 'store'])->name('platform-info.store');
