<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->group(['prefix' => 'v1'], function ($api) { // Use this route group for v1
		$api->group(['prefix' => 'auth'], function ($api) { // Use this route group for auth

			$api->get('login', function(){
				return ['hello'=>'world'];
			});

			$api->post('register', 'App\Http\Controllers\API\V1\AuthController@register')->name('register');
			$api->post('login', 'App\Http\Controllers\API\V1\AuthController@login')->name('login');
			$api->post('logout', 'App\Http\Controllers\API\V1\AuthController@logout');
			$api->post('refresh', 'App\Http\Controllers\API\V1\AuthController@refresh');
			$api->post('me', 'App\Http\Controllers\API\V1\AuthController@me');
		});
	});
});
