<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Authentication')->group(function() {
    Route::resource('login', 'Login');
    Route::resource('logout', 'Logout');
    Route::resource('register', 'Register');
});
Route::namespace('Home')->group(function(){
    Route::resource('home', 'Home');
    Route::resource('wordfollow', 'MyWordRemember');
    Route::resource('lessondetail', 'DetailLesson');
    Route::resource('lesson', 'Lessons');
    Route::resource('topic', 'Topics');
});
Route::namespace('Admin')->group(function(){
    Route::resource('admin', 'HomeAdmin');
});
