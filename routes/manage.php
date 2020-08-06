<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@redirect')->name('redirect');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::get('/{id}/edit', 'UserController@edit')->name('edit');
    Route::post('/create', 'UserController@store')->name('store');
    Route::post('/{id}/edit', 'UserController@update')->name('update');
    Route::delete('/{id}/delete', 'UserController@destroy')->name('destroy');
});

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profile');
