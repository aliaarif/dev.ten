<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => 'auth:api'], function() {
// 	Route::get('/user', function (Request $request) {
// 		return App\User::all();
// 	});
// 	Route::post('register','Auth\RegisterController@apiRegister');
// });


Route::post('login', 'ApiController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('get-details', 'API\PassportController@getDetails');
});
Route::post('/users', 'API\PassportController@getData');