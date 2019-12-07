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
Route::get("/subscription", ["as" => "auth.plans.get", "uses" => "Auth\PlanController@getPlans"]);

Route::get("admin/setup", ["as" => "admin.setup.get", "uses" => "AdminController@setup"]);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', ['as' => 'dashboard.get', 'uses' => 'OwnerController@dashboard']);
Route::get('/members', ['as' => 'members.list', 'uses' => 'MemberController@index']);
Route::get('/payments', ['as' => 'payments.list', 'uses' => 'PaymentController@index']);
Route::get('/plans', ['as' => 'plans.list', 'uses' => 'PlansController@index']);
Route::get('/settings', ['as' => 'settings.get', 'uses' => 'OwnerController@setting']);

// Route::get("/business/setup", ["as" => "auth.business.setup.get", "uses" => "CommerceController@getAgencyRequest"]);
