<?php

Route::redirect('/', 'home');
Route::view('home', 'welcome')->name('home');

Route::resource('category', \App\Http\Controllers\CategoryController::class);
Route::resource('post', \App\Http\Controllers\PostController::class);
