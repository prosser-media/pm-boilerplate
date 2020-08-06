<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login')->name('login');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'RegisterController@register')->name('register');

Route::prefix('/password')->name('password.')->group(function () {
    Route::get('/reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
    Route::post('/email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
    Route::get('/reset/{token}', 'ForgotPasswordController@showRestForm')->name('form');
    Route::get('/post', 'ForgotPasswordController@reset')->name('reset');
});
