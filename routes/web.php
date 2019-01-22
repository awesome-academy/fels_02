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
Route::pattern('id','[0-9]*');
Route::pattern('slug','(.*)');

Route::namespace('Lang')->group(function (){
    Route::post('/lang', [
        'as' => 'switch.lang',
        'uses' => 'Languages@index',
    ])->middleware('localization');
});

Route::namespace('Authentication')->middleware('localization')->group(function() {
    Route::resource('login', 'Login');
    Route::resource('logout', 'Logout');
    Route::resource('register', 'Register');
    Route::resource('forgot', 'Forgot');
    Route::get('/redirect/{social}', 'Social@redirect');
    Route::get('/callback/{social}', 'Social@callback');

});

Route::namespace('Home')->middleware('localization')->group(function(){
    Route::resource('test-lesson','TestLessons')->middleware('testlesson');
    Route::resource('home', 'Home');
    Route::resource('history', 'MyHistory');
    Route::resource('wordfollow', 'MyWordRemember');
    Route::resource('lessondetail', 'DetailLesson');
    Route::resource('lesson', 'Lessons');
    Route::resource('topic', 'Topics');
    Route::resource('user-progress','UserProgress');
    Route::post('/test/{id}',[
        'uses' => 'TestLessons@testLesson',
        'as' => 'test',
    ]);
    Route::resource('words', 'Words');
    Route::post('/wordRemember',[
        'uses' => 'Words@wordRemember',
    ]);
    
});

Route::namespace('Admin')->middleware('localization')->group(function(){
    Route::resource('adminlesson', 'LessonManager');
    Route::resource('admin', 'HomeAdmin');
    Route::resource('user', 'Users');
    Route::resource('topic-admin', 'TopicsAdmin');
    Route::post('/user/update-status', [
        'uses' => 'Users@updateStatus',
    ]);
});
