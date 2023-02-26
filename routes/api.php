<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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

Route::group(['prefix' => 'courses'], function(){
    Route::post('/create', [CourseController::class, 'storeCourse']);
    Route::post('/update-course', [CourseController::class, 'updateCourse']);
    Route::group(['prefix' => 'curriculum'], function(){
        Route::post('/update', [CourseController::class, 'updateCurriculum']);
        Route::post('/store', [CourseController::class, 'newCurriculum']);
    });
});
