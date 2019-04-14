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
//    dd('hey');
    return view('signIn');
});
Route::get('/registrate', function () {
    return view('registration');
});
Route::get('/commercialRegister/{photo}', function ($photo) {
    return view('commercialRegister', ['photo' =>$photo]);
});

// Admin Panel //
Route::get('/showRequests', function () {
    return view('AdminPanel.adminShowReguests');
});
Route::get('/pendingRequests', function () {
    return view('AdminPanel.pendingRequests');
});

Route::get('/citiesRegions', function () {
    return view('AdminPanel.citiesAndRegions');
});
Route::get('/addPayment', function () {
    return view('AdminPanel.addPayment');
});



//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('login','MainController@checklogin') ;
// Route::post('ownerRegistrate','MainController@registrateOwner') ;
// // Admin Controller
Route::get('/RequestsData', 'AdminController@index');
Route::post('/acceptRequest/{id}', 'AdminController@updateState');
Route::post('/deleteRequest/{id}', 'AdminController@deleteRequest');
Route::get('/showpending','AdminController@showpendingRequests');
Route::post('/updateUserActivate/{id}','AdminController@updateUserActivate');
// // Owner Controller
// Route::get('/ownerPanel/{id}', 'OwnerController@show');
// Route::get('/send', 'AdminController@sendMail');


Route ::get('/main','MainController@index');
Route ::post('/main/checklogin','MainController@checklogin');
Route ::get('main/successlogin','MainController@successlogin');
Route ::post('main/logout','MainController@logout');

