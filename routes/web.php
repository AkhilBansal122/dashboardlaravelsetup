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
use App\Http\Controllers\LoginController;

Route::get('/',[LoginController::class, 'index']);

Route::post('/custom-login','App\Http\Controllers\LoginController@customLogin')->name('login.custom');
Route::get('/dashboard','App\Http\Controllers\LoginController@dashboard')->middleware('logincheck');
Route::get('/my_profile','App\Http\Controllers\LoginController@my_profile')->middleware('logincheck');

Route::post('/update_admin_profile','App\Http\Controllers\LoginController@update_admin_profile')->middleware('logincheck');
Route::post('/user_change_password','App\Http\Controllers\LoginController@user_change_password')->middleware('logincheck');

Route::post('/forgetpassword','App\Http\Controllers\LoginController@forgetpassword');





Route::get('/logout','App\Http\Controllers\LoginController@logout');
//------------------blog category----------------------------------
Route::get('/blogcategory_list','App\Http\Controllers\Blog_categoriesControllers@blogcategory_list')->middleware('logincheck');
Route::post('/addblogcategory','App\Http\Controllers\Blog_categoriesControllers@addblogcategory')->name('addblogcategory')->middleware('logincheck');
Route::post('/editblogcategory','App\Http\Controllers\Blog_categoriesControllers@editblogcategory')->name('editblogcategory')->middleware('logincheck');
Route::post('/blogcategory_status','App\Http\Controllers\Blog_categoriesControllers@blogcategory_status')->name('blogcategory_status')->middleware('logincheck');
Route::get('/blogcategory_del/{id}','App\Http\Controllers\Blog_categoriesControllers@blogcategory_del')->name('blogcategory_del')->middleware('logincheck');



//----------------- end-blog category----------------------------------
//------------------blog list----------------------------------

Route::get('/blog_list','App\Http\Controllers\BlogControllers@blog_list')->middleware('logincheck');
Route::get('/addblogView','App\Http\Controllers\BlogControllers@addblogView')->middleware('logincheck');
Route::post('/addblog','App\Http\Controllers\BlogControllers@addblog')->name('addblog')->middleware('logincheck');
Route::post('/editblog','App\Http\Controllers\BlogControllers@editblog')->name('editblog')->middleware('logincheck');
Route::post('/blog_status','App\Http\Controllers\BlogControllers@blog_status')->name('blog')->middleware('logincheck');
Route::get('/blog_del/{id}','App\Http\Controllers\BlogControllers@blog_del')->name('blog_del')->middleware('logincheck');


//------------------end blog list----------------------------------


//------------------services list----------------------------------

Route::get('/services_list','App\Http\Controllers\ServicesControllers@services_list')->middleware('logincheck');
Route::get('/services_add','App\Http\Controllers\ServicesControllers@services_add')->middleware('logincheck');
Route::get('/services_edit','App\Http\Controllers\ServicesControllers@services_edit')->middleware('logincheck');
Route::post('/manage_services','App\Http\Controllers\ServicesControllers@manage_services')->name('manage_services')->middleware('logincheck');
Route::post('/services_status','App\Http\Controllers\ServicesControllers@services_status')->name('services_status')->middleware('logincheck');
Route::get('/services_delete/{id}','App\Http\Controllers\ServicesControllers@services_delete')->name('services_delete')->middleware('logincheck');


//------------------services details list----------------------------------

Route::get('/services_details_list','App\Http\Controllers\ServicesDetailsControllers@services_details_list')->middleware('logincheck');
Route::get('/services_details_add','App\Http\Controllers\ServicesDetailsControllers@services_details_add')->middleware('logincheck');
Route::get('/services_edit','App\Http\Controllers\ServicesDetailsControllers@services_edit')->middleware('logincheck');
Route::post('/manage_servicesdetails','App\Http\Controllers\ServicesDetailsControllers@manage_servicesdetails')->name('manage_servicesdetails')->middleware('logincheck');
Route::post('/services_status','App\Http\Controllers\ServicesDetailsControllers@services_status')->name('services_status')->middleware('logincheck');
Route::get('/services_details_delete/{id}','App\Http\Controllers\ServicesDetailsControllers@services_details_delete')->name('services_details_delete')->middleware('logincheck');




Route::get('signout', [App\Http\Controllers\LoginController::class, 'signOut'])->name('signout')->middleware('logincheck');
