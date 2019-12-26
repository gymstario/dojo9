<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
 */

Route::get('admin/setup', ['as' => 'admin.setup.get', 'uses' => 'AdminController@setup']);
Route::get('/pricing', ['as' => 'plans.admin.list', 'uses' => 'PlansController@getAdminPlans']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\LoginController@logout']);
});

Route::middleware(['owner', 'auth'])->group(function () {
    Route::get('/dashboard', ['as' => 'dashboard.get', 'uses' => 'OwnerController@dashboard']);
    Route::get('/studio', ['as' => 'studio.get', 'uses' => 'StudioController@setup']);
    Route::post('/studio', ['as' => 'studio.post', 'uses' => 'StudioController@postSetup']);

    Route::get('/students', ['as' => 'students.list', 'uses' => 'MemberController@index']);

    Route::get('/payments', ['as' => 'payments.list', 'uses' => 'PaymentController@index']);

    Route::get('/settings', ['as' => 'settings.get', 'uses' => 'OwnerController@setting']);

    Route::get('/plans', ['as' => 'plans.list', 'uses' => 'PlansController@index']);
    Route::post('/plans', ['as' => 'plans.post', 'uses' => 'PlansController@postPlan']);

    Route::get('/branches', ['as' => 'branch.list', 'uses' => 'BranchController@index']);
    Route::post('/branches', ['as' => 'branch.post', 'uses' => 'BranchController@store']);
    Route::get('/branch/add', ['as' => 'branch.create', 'uses' => 'BranchController@create']);

    Route::get('/classes', ['as' => 'class.list', 'uses' => 'ClassController@index']);
    Route::post('/classes', ['as' => 'class.post', 'uses' => 'ClassController@store']);
});

// Route::get('/business/setup', ['as' => 'auth.business.setup.get', 'uses' => 'CommerceController@getAgencyRequest']);

Auth::routes(['verify' => true]);
Route::get('/{any}', ['as' => 'frontend.page', 'uses' => 'FrontEndController@getPage']);
