<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes(['register' => false,'verify' => true]);


//  User_DashBoard
Route::prefix('')->middleware(['auth',])->group(function(){
    Route::get('', 'HomePageController@index')->name('home');
    Route::get('invoice', 'HomePageController@invoice')->name('invoice');
    Route::get('articles', 'HomePageController@articles')->name('articles');
    Route::get('notify', 'NotificationController@notifySchedule')->name('n');
    Route::get('markAsRead', 'NotificationController@markAll')->name('mark');
    // TO CRUD ON JSON API
    Route::prefix('/quotes')->group(function(){
        Route::get('', 'APIController@index')->name('api.index');
        Route::get('/create', 'APIController@create')->name("api.create");
        Route::post('', 'APIController@store')->name("api.store");
        Route::get('/{api}', 'APIController@show')->name("api.show");
        Route::get('/{api}/edit', 'APIController@edit')->name("api.edit");
        Route::put('/{api}', 'APIController@update')->name("api.update");
        Route::delete('/{api}', 'APIController@destroy')->name("api.destroy");
    });
});

//  Admin_DashBoard
Route::prefix('/admin')->middleware(['auth','admin',])->group(function(){

    // Routes For User
    Route::get('', 'StatisticController@index')->name('admin');

    // Admin => UserPAGE
    Route::prefix('/users')->group(function(){
        Route::get('', 'UserController@index')->name('users.index');
        Route::get('/create', 'UserController@create')->name("users.create");
        Route::post('', 'UserController@store')->name("users.store");
        Route::get('/{user}', 'UserController@show')->name("users.show");
        Route::get('/{user}/edit', 'UserController@edit')->name("users.edit");
        Route::put('/{user}', 'UserController@update')->name("users.update");
        Route::delete('/{user}', 'UserController@destroy')->name("users.destroy");
    });

    // Admin => Patient PAGE
    Route::prefix('/patients')->group(function(){
        Route::get('', 'PatientController@index')->name('patients.index');
        Route::get('/create', 'PatientController@create')->name("patients.create");
        Route::post('', 'PatientController@store')->name("patients.store");
        Route::get('/{patient}', 'PatientController@show')->name("patients.show");
        Route::get('/{patient}/edit', 'PatientController@edit')->name("patients.edit");
        Route::put('/{patient}', 'PatientController@update')->name("patients.update");
        Route::delete('/{patient}', 'PatientController@destroy')->name("patients.destroy");
    });

    // Admin => Visit PAGE
    Route::prefix('')->group(function(){
        Route::get('visits', 'VisitController@index')->name('visits.index');
        Route::get('visits/create/{patient}', 'VisitController@create')->name("visits.create");
        // toStoreVisits
        Route::post('/{patient}/visits', 'VisitController@store')->name("patients.visits.store");

    });

     // Admin => SChudual PAGE
    Route::prefix('/schedule')->group(function(){
        Route::get('', 'ScheduleController@index')->name('schedule.index');
        Route::get('/create', 'ScheduleController@create')->name("schedule.create");
        Route::post('', 'ScheduleController@store')->name("schedule.store");
        Route::get('/{schedule}/edit', 'ScheduleController@edit')->name("schedule.edit");
        Route::put('/{schedule}', 'ScheduleController@update')->name("schedule.update");
        Route::delete('/{schedule}', 'ScheduleController@destroy')->name("schedule.destroy");

    });

    // Admin => Calender PAGE
    Route::prefix('/calender')->group(function(){
        Route::get('', 'CalenderController@index')->name('calender.index');
        Route::post('/update', 'CalenderController@update');
        Route::post('/delete', 'CalenderController@destroy');
    });

        //Admin => Statistics PAGE
    Route::prefix('/statistics')->group(function(){
        Route::get('', 'StatisticController@index')->name('statistics.index');
        Route::get('/create', 'StatisticController@create')->name("statistics.create");
        Route::post('', 'StatisticController@store')->name("statistics.store");
        Route::get('/{statistics}', 'StatisticController@show')->name("statistics.show");
        Route::get('/{statistics}/edit', 'StatisticController@edit')->name("statistics.edit");
        Route::put('/{statistics}', 'StatisticController@update')->name("statistics.update");
        Route::delete('/{statistics}', 'StatisticController@destroy')->name("statistics.destroy");
    });

        //Admin => articles PAGE
    Route::prefix('/articles')->group(function(){
        Route::get('', 'ArticleController@index')->name('articles.index');
        Route::get('/create', 'ArticleController@create')->name("articles.create");
        Route::post('', 'ArticleController@store')->name("articles.store");
        Route::get('/{articles}', 'ArticleController@show')->name("articles.show");
        Route::get('/{articles}/edit', 'ArticleController@edit')->name("articles.edit");
        Route::put('/{articles}', 'ArticleController@update')->name("articles.update");
        Route::delete('/{articles}', 'ArticleController@destroy')->name("articles.destroy");
    });

    Route::prefix('/about')->group(function(){
        Route::get('', 'AboutController@index')->name('about.index');
        Route::put('', 'AboutController@update')->name("about.update");
    });
 

    Route::prefix('/setting')->group(function(){
        Route::get('', 'SettingController@index')->name('setting.index');
        Route::put('', 'SettingController@update')->name("setting.update");
    });
        
});
