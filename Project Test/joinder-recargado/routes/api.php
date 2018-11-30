<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json([
        'user' => [
            'first_name' => 'Ernesto',
            'last_name' => 'Guerra'
            ]
        ]);
});

// -------------------------------------------------------------------------------------------------------

Route::group(['middleware' => 'auth:api'],function(){
    Route::resource('/question', 'QuestionController');
});

Route::get('/users', 'AllsController@users');

Route::get('/users/{id}', 'AllsController@findUsers');

Route::resource('/subjects','SubjectController');

Route::resource('/answer', 'AnswerController');

Route::get('/Qanswers/{question_id}','AnswerController@Qanswers');