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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signIn', function () {
    return view('signIn');
});
Route::get('/registrate', function () {
    return view('registration');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('login','MainController@checklogin') ; 
Route::post('ownerRegistrate','MainController@registrateOwner') ; 
// Admin Controller
Route::get('/RequestsData', 'AdminController@index');
Route::get('/acceptRequest/{id}', 'AdminController@updateState');
Route::get('/deleteRequest/{id}', 'AdminController@deleteRequest');
// Owner Controller
Route::get('/ownerPanel/{id}', 'OwnerController@show');

 
