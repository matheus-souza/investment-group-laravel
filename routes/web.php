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

/**
 * Routes to user auth
 */
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

Route::resource('user', 'UsersController');
Route::resource('institution', 'InstitutionsController');
Route::resource('group', 'GroupsController');
Route::resource('institution.product', 'ProductsController');

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);
