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
Route::post('login', 'AuthController@authAdmin');
Route::post('students/login', 'AuthController@authStudent');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:admin')->group(function () {
    Route::get('exams/deactivate', 'ExamController@deactivate');
    Route::put('students/approve/{id}', 'StudentController@approve');
    Route::post('courses/{examId}', 'StudentController@store');
    Route::delete('courses/{id}', 'StudentController@destroy');
    Route::resource('exams', 'ExamController')->only([
        'index', 'store', 'destroy', 'show'
    ]);
    Route::resource('courses', 'CourseController')->only([
        'store', 'destroy', 'show'
    ]);
    Route::resource('students', 'StudentController');
});
