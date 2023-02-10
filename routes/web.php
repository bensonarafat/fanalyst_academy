<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::get('/', [PagesController::class, "index"])->name("home");
Route::get("/about", [PagesController::class, "about"])->name("about");
Route::get("/contact", [PagesController::class, "contact"])->name("contact");
Route::get("/students", [PagesController::class, "students"])->name("students");
Route::get("/lectures",[PagesController::class, "lectures"])->name("lectures");

Route::group(['middleware' => 'auth'], function (){


    Route::group(['prefix' => 'explore'], function(){
        Route::get('/', [PagesController::class, 'explore'])->name('explore');
    });

    Route::group(['prefix' => 'saved'], function(){
        Route::get('/', [PagesController::class, 'saved'])->name('saved');
    });

    Route::group(['prefix' => 'analysis'], function(){
        Route::get('/', [PagesController::class, "analysis"])->name('analysis');
    });


    Route::group(['prefix' => 'courses'], function(){
        Route::get('/', [PagesController::class, 'courses'])->name('courses');
        Route::get('/create', [PagesController::class, 'createCourse'])->name('create.course');
    });

    Route::group(['prefix' => 'notifications'], function(){
        Route::get('/', [PagesController::class, 'notifications'])->name('notifications');
    });

    Route::group(['prefix'=> 'reviews'], function() {
        Route::get('/', [PagesController::class, 'reviews'])->name('reviews');
    });

    Route::group(['prefix' => 'earnings'], function(){
        Route::get('/', [PagesController::class, 'earnings'])->name('earnings');
    });

    Route::group(['prefix' => 'payouts'], function(){
        Route::get('/', [PagesController::class, 'payouts'])->name('payouts');
    });

    Route::group(['prefix' => 'statements'], function(){
        Route::get('/', [PagesController::class, 'statements'])->name('statements');
    });

    Route::group(['prefix' => 'verifications'], function(){
        Route::get('/', [PagesController::class, 'verifications'])->name('verifications');
    });

    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [PagesController::class, 'users'])->name('users');
        Route::get('/instructor-application', [PagesController::class, 'instructorApplication'])->name('instructor.application');
        Route::post('/instructor-application', [UserController::class, 'instructorApplication'])->name('store.instructor.application');
        Route::get('/view/{id}', [PagesController::class, 'viewUser'])->name('view.user');
        Route::post('/update-instructor-status', [UserController::class, 'updateInstructorStatus'])->name('update.instructor.status');
    });

    //category
    Route::group(['prefix' => 'category'], function(){
        Route::get('/add', [PagesController::class, 'addCategory'])->name('add.category');
        Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
        Route::post('/update-category', [CategoryController::class, 'update'])->name('update.category');
        Route::get('/edit-category/{id}', [PagesController::class, 'editCategory'])->name('edit.category');
        Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');
        Route::get('/category/cat/{id}', [PagesController::class, 'viewCategory']);
    });

    //settings
    Route::group(['prefix' => 'settings'], function(){
        Route::get('/', [PagesController::class, 'settings'])->name('settings');
    });
});
