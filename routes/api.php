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
Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('register', 'AuthController@register');

});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*another api tutorial project*/
Route::get('country','Country\CountryController@country');
Route::get('country/{id}','Country\CountryController@countrybyid');
Route::post('countrycreate','Country\CountryController@countrycreate');
Route::post('countrycupdate/{id}','Country\CountryController@countrycupdate');
Route::get('students', 'ApiController@getAllStudents');
/*another api tutorial project*/

/*student enrolment*/
Route::apiResource('class', 'Api\ClassController');
Route::apiResource('subject', 'Api\SubjectController');
Route::apiResource('section', 'Api\SectionController');
Route::apiResource('student', 'Api\StudentController');
/*https://www.youtube.com/watch?v=bU1nVHSmGhk&list=PLYVcyg3AF-zvDDXBLDyn9UJSgAYMWpUS3&index=2
https://www.youtube.com/watch?v=2RuPxEPOphw&list=PLbC4KRSNcMnoQONzuNtFlhEzegTYadoBY&index=5*/
