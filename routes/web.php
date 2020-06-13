<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::prefix('/admin')->middleware(['auth',])->group(function(){
    // Routes For User
    Route::get('', 'HomeController@admin');
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
        // Route::get('patients/{patient}', 'PatientController@show')->name("patients.show");
        // Route::post('/{post}/comments', 'CommentController@store')->name("posts.visits.store");
        // Route::post('visits', 'VisitController@store')->name("visits.store");
        // Route::get('patients/{patient}/edit', 'PatientController@edit')->name("patients.edit");
        // Route::put('patients/{patient}', 'PatientController@update')->name("patients.update");
        // Route::delete('patients/{patient}', 'PatientController@destroy')->name("patients.destroy");
    });
     // Admin => SChudual PAGE
     Route::prefix('/schedule')->group(function(){
        Route::get('', 'ScheduleController@index')->name('schedule.index');
        // Route::get('/create', 'PatientController@create')->name("patients.create");
        // Route::post('', 'PatientController@store')->name("patients.store");
        // Route::get('/{patient}', 'PatientController@show')->name("patients.show");
        // Route::get('/{patient}/edit', 'PatientController@edit')->name("patients.edit");
        // Route::put('/{patient}', 'PatientController@update')->name("patients.update");
        // Route::delete('/{patient}', 'PatientController@destroy')->name("patients.destroy");
    });
        
});