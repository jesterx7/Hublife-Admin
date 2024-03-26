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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::group(['prefix'=>'formHeader'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getForm');
        Route::post('/', 'App\Http\Controllers\ApiController@insertForm');
    });
    
    Route::group(['prefix'=>'questions'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getQuestions');
        Route::post('/', 'App\Http\Controllers\ApiController@insertQuestions');
    });
    
    Route::group(['prefix'=>'answers'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getAnswers');
        Route::post('/', 'App\Http\Controllers\ApiController@insertAnswers');
    });

    Route::group(['prefix'=>'careers'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getCareers');
    });

    Route::group(['prefix'=>'elementQuestions'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getElementQuestions');
        Route::get('/{seq}', 'App\Http\Controllers\ApiController@getElementQuestionsBySeq');
    });

    Route::group(['prefix'=>'values'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getValues');
    });

    Route::group(['prefix'=>'actions'], function(){
        Route::get('/', 'App\Http\Controllers\ApiController@getActions');
    });
});


