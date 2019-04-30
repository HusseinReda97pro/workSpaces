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
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/searchWS', function () {
    return view('searchWS');
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
// Owner Panel
Route::get('/editData', function () {
    return view('OwnerPanel.editData');
});

Route::get('/showPayment', 'OwnerController@showPayment');


//Auth::routes();

Route::get('/logout', 'MainController@logout');

// // Admin Controller
Route::get('/RequestsData', 'AdminController@index');
Route::post('/acceptRequest/{id}', 'AdminController@updateState');
Route::post('/deleteRequest/{id}', 'AdminController@deleteRequest');
Route::get('/showpending','AdminController@showpendingRequests');
Route::post('/updateUserActivate/{id}','AdminController@updateUserActivate');
Route::post('/addCity','AdminController@city');
Route::get('/showCities','AdminController@showCity');
Route::post('/addRegion','AdminController@region');
Route::post('/deleteCity/{id}', 'AdminController@deleteCity');
Route::post('/deleteRegion/{region_name}', 'AdminController@deleteRegion');

Route::post('/requestregistration', 'MainController@registrateOwner');

Route ::post('addPaymenttoDb','AdminController@addPayment');

// // Owner Controller
Route ::get('/ownerPanel','OwnerController@index');
Route ::get('/getWS/{id}','OwnerController@getWorkspaceData');
Route ::get('/getPlaceData/{id}','OwnerController@getPlaceData');
Route ::post('/updatePlaceData','OwnerController@updatePlaceData');
Route ::post('/deleteWS/{id}','OwnerController@deleteWS');

Route ::get('/requestCity','OwnerController@getCities');
Route ::get('/requestRegion/{city_id}','OwnerController@requestRegion');
Route ::post('/placeData','OwnerController@storePlace');
Route ::post('/main/checklogin','MainController@checklogin');
Route ::get('main/successlogin','MainController@successlogin');
Route ::post('main/logout','MainController@logout');
// search workspaces
Route ::get('/RequestWorkspaces','WorkSpacesController@getWorkspaces');
Route ::post('/searchWorkspaceRegion','WorkSpacesController@searchWorkspaceRegion');
// بص يا حسين الراوت الي تحتيا ده الريكويست فيه قوته 2000 ريختر
// لا بص بجد الراوت ده كان بياخد بارامتر name وانا خليته يا خد ريكويست بدل البرامتر وبقي post بدل get
Route ::get('/searchWorkspaceName/{name}','WorkSpacesController@searchWorkspaceName');
// التعديل
//Route ::post('/searchWorkspaceName','WorkSpacesController@searchWorkspaceName');

Route ::post('/userSeeDetails','WorkSpacesController@userSeeDetails');

