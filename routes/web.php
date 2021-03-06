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
    return redirect()->route('user.login');
});

/**
 * Routes to user auth
 */
Route::get('/login', ['as' => 'user.login', 'uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

Route::resource('user', 'UsersController');
Route::resource('institution', 'InstitutionsController');
Route::resource('group', 'GroupsController');
Route::resource('institution.product', 'ProductsController');

Route::get('/moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('/moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);
