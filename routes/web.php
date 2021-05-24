<?php

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
//     return view('welcome');
// });

Route::get('/', 'PaymentController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']],function (){
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('products', 'ProductController');
    // Route::resource('/roles','RoleController');
    Route::resource('/permissions','PermissionController');
    Route::resource('/doctors','DoctorController');
    Route::resource('/locations','LocationController');
    Route::resource('/sectors','SectorController');
    Route::resource('/specialities','SpecialitiesController');
    Route::resource('/educations','DoctorEducationController');
    Route::resource('/schedules','DoctorScheduleController');
});

