<?php

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

Auth::routes(['verify' => true]);
Route::get("/plans", ["as" => "auth.plans.get", "uses" => "Auth\PlanController@getPlans"]);

Route::get("admin/setup", ["as" => "admin.setup.get", "uses" => "AdminController@setup"]);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// Route::get("/business/setup", ["as" => "auth.business.setup.get", "uses" => "CommerceController@getAgencyRequest"]);
