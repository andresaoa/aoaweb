<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.index')->name('admin.index');