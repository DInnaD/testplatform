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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/***REGISTRATION***/
Route::post('register', 'Auth\RegisterController@register');
/***END-REGISTRATION***/

/***USER-LOGIN***/
Route::post('login', 'Auth\LoginController@login');
Route::post('auth', 'AuthController@socialLogin');
/***END-USER-LOGIN***/

/***END-USER-LOGOUT***/
Route::post('logout', 'Auth\LoginController@logout');
/***END-USER-LGOUT***/

//Route::group(['middleware' => ['jwt.auth']], function () {
Route::middleware('auth:api')->group(function () {

    /*** USER ***/
    Route::get('user/history', 'UserController@history');
    Route::get('user/profile', 'UserController@profile');
    Route::delete('user/history/{product}', 'UserController@deleteProduct');
    Route::delete('user/history/', 'UserController@deleteProductAll');

    Route::apiResource('user', 'UserController')->only(['index', 'show', 'update']);
    //Route::get('user', 'UserController@index');
    //Route::get('user/{user}', 'UserController@show');
    //Route::put('user', 'UserController@update');
    /*** END - USER ***/

    /*** PROFILE ***/


    Route::post('user/update/pass', 'UserController@updatePassword');

    Route::apiResource('profile', 'ProfileController')->except(['show', 'store']);
    // Route::get('profile', 'ProfileController@index');
    // Route::get('profile/update', 'ProfileController@update');
    // Route::get('profile/delete', 'ProfileController@destroy');
    /*** END - PROFILE ***/

    /*** CATEGORY ***/
    Route::apiResource('category', 'CategoryController');
    /*** END - CATEGORY ***/

    /*** TAG ***/
    Route::apiResource('tag', 'TagController');
    /*** END - TAG ***/

    /*** TEST ***/
    Route::get('tests/filter', 'TestController@filter');//products/?filter

    Route::apiResource('test', 'TestController');
    /*** END - TEST ***/

    /*** AUTOTEST ***/
    Route::get('auto_tests/filter', 'AutoTestController@filter');//products/?filter

    Route::apiResource('auto_test', 'AutoTestController');
    /*** END - AUTOTEST ***/

    /*** AUTORESULT ***/
    Route::get('auto_results/filter', 'AutoResultController@filter');//products/?filter

    Route::apiResource('auto_result', 'AutoResultController');
    /*** END - AUTOREESULT ***/

    /*** RESULT ***/
    Route::get('results/filter', 'ResultController@filter');//products/?filter

    Route::apiResource('result', 'ResultController');
    /*** END - RESULT ***/

    /*** QUESTION ***/
    Route::get('questions/filter', 'ProductController@filter');//products/?filter

    Route::apiResource('question', 'QuestionController');
    /*** END - QUESTION ***/

    /*** ANSWER ***/
    Route::get('answers/filter', 'AnswerController@filter');//products/?filter

    Route::apiResource('answer', 'AnswerController');
    /*** END - ANSWER ***/

});
