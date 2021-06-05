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
    return redirect('/login');
});

Auth::routes();
Route::get('/admin-logout','HomeController@logout');

/**
 * Admin Routes Start Here  
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){

    Route::get('profile','Admin\ProfileController@show');
    Route::post('profile-update','Admin\ProfileController@update');
    

    Route::get('/home', 'HomeController@index')->name('home'); // After Login Admin Redirect to This Route
    Route::resource('/client','Admin\ClientController');       //Client Route for Create Update or Index
    Route::get('/client/{id}/delete','Admin\ClientController@destroy'); //Delete Client Route

    Route::resource('/project','Admin\ProjectController');       //Client Route for Create Update or Index
    Route::get('/project/{id}/delete','Admin\ProjectController@destroy'); //Delete Client Route

    Route::resource('/transaction','Admin\TransactionController');       //transaction Route for Create Update or Index
    Route::get('/transaction/{id}/delete','Admin\TransactionController@destroy'); //Delete transaction Route
    Route::get('/transaction/{id}/view','Admin\TransactionController@show'); //Delete transaction Route

});    
