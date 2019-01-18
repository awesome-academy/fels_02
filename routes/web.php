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
    Route::get('/redirect/{social}', 'Social@redirect');
    Route::get('/callback/{social}', 'Social@callback');

});

Route::namespace('Home')->middleware('localization')->group(function(){
    Route::resource('test-lesson','TestLessons')->middleware('testlesson');
    Route::resource('home', 'Home');
    Route::resource('wordfollow', 'MyWordRemember');
    Route::resource('lessondetail', 'DetailLesson');
    Route::resource('lesson', 'Lessons');
    Route::resource('topic', 'Topics');
    Route::resource('progress','UserProgress');
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
    Route::resource('admin', 'HomeAdmin');
    Route::resource('user', 'Users');
    Route::resource('topic-admin', 'TopicsAdmin');
    Route::post('/user/update-status', [
        'uses' => 'Users@updateStatus',
    ]);
    Route::get('/', [
        'uses' => 'Charts@index',
    ]);
});
Route::get('api', function(){
  // Get the number of days to show data for, with a default of 7
  $days = Input::get('days', 1);

  $range = CarbonCarbon::now()->subDays($days);

  $stats = DB::table('test_lesson')
    ->where('created_at', '>=', $range)
    ->groupBy('created_at')
    ->orderBy('created_at', 'ASC')
    ->get([
      DB::raw('Month(created_at) as month'),
      DB::raw('COUNT(*) as value')
    ]);

  return $stats;
});