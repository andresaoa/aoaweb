<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\MarqueeController;
use App\Http\Controllers\NavController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.index')->name('admin.index');

Route::resource('banners', BannerController::class);
Route::resource('navs', NavController::class);
Route::resource('carousels', CarouselController::class);
Route::resource('marquees', MarqueeController::class);