<?php

use App\Http\Controllers\BarrowController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\mybooksController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\userController;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('pages/managebooks');
// });



Route::get('/', function () {
    return view('pages/login');
});//->middleware('checkeLoged');

Route::post('/loging_in',[loginController::class,('check')]);
Route::get('/log',[loginController::class,('log')]);

//category routes
Route::get('/manage_category',[CategoryController::class,('index')]);//->middleware('checkeLoged');
Route::get('/delete_category/{id}',[CategoryController::class,('delete')]);
Route::post('/add_category',[CategoryController::class,('add')]);
Route::get('/edit_category/{id}',[CategoryController::class,('edit')]);
Route::post('/update_category/{id}',[CategoryController::class,('update')]);

//book routes
Route::get('/manage_books',[bookController::class,('index')])->middleware('checkeLoged');
Route::get('/delete/{id}',[bookController::class,('delete')]);
Route::post('/add',[bookController::class,('add')]);
Route::get('/edit/{id}',[bookController::class,('edit')]);
Route::post('/update/{id}',[bookController::class,('update')]);


//user routes
Route::get('/manage_users',[userController::class,('index')]);
Route::post('/add_user',[userController::class,('add')]);
Route::get('/delete_user/{id}',[userController::class,('delete')]);
Route::get('/edit_user/{id}',[userController::class,('edit')]);
Route::post('/update_user/{id}',[userController::class,('update')]);

//profile routes
Route::get('/profile/{id}',[profileController::class,('index')]);

//barrow routes
Route::get('/barrow/{id}',[BarrowController::class,('barrow')]);
Route::get('/return/{id}/{barrowid}',[BarrowController::class,('return')]);


//home routes
Route::get('/home',[homeController::class,('index')]);


//mybooks routes
Route::get('/my_books',[mybooksController::class,('index')]);




