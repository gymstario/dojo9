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

    Route::get('/members', ['as' => 'members.list.get', 'uses' => 'MemberController@index']);
    Route::get('/members/create', ['as' => 'members.create.get', 'uses' => 'MemberController@create']);
    Route::post('/members/create', ['as' => 'members.create.post', 'uses' => 'MemberController@store']);

    Route::get('/payments', ['as' => 'payments.list', 'uses' => 'PaymentController@index']);

    Route::get('/settings', ['as' => 'settings.get', 'uses' => 'OwnerController@setting']);

    Route::get('/plans', ['as' => 'plans.list', 'uses' => 'PlansController@index']);
    Route::post('/plans', ['as' => 'plans.post', 'uses' => 'PlansController@postPlan']);

    Route::get('/classes', ['as' => 'class.list', 'uses' => 'ClassController@index']);
    Route::post('/classes', ['as' => 'class.post', 'uses' => 'ClassController@store']);

    Route::get('/account/merchant', ['as' => 'account.merchant.get', 'uses' => 'OwnerController@merchant']);
    Route::post('/account/merchant', ['as' => 'account.merchant.post', 'uses' => 'OwnerController@postMerchant']);

    Route::get('/account/profile', ['as' => 'account.profile.get', 'uses' => 'OwnerController@profile']);
    Route::post('/account/profile', ['as' => 'account.profile.post', 'uses' => 'OwnerController@postProfile']);

    Route::get('/account/billing', ['as' => 'account.billing.get', 'uses' => 'OwnerController@billing']);
    Route::post('/account/billing', ['as' => 'account.billing.post', 'uses' => 'OwnerController@postBilling']);

    Route::get('/account/locations', ['as' => 'branch.list', 'uses' => 'OwnerController@locations']);
    Route::post('/account/locations', ['as' => 'branch.post', 'uses' => 'OwnerController@postLocation']);
});

// Route::get('/business/setup', ['as' => 'auth.business.setup.get', 'uses' => 'CommerceController@getAgencyRequest']);

Auth::routes(['verify' => true]);
Route::get('/enrolment/{id}', ['as' => 'student.account.enrolment.get', 'uses' => 'StudioController@enrolment']);
Route::post('/enrolment/{id}', ['as' => 'student.account.enrolment.post', 'uses' => 'StudioController@postEnrolment']);
Route::get('/{any}', ['as' => 'frontend.page', 'uses' => 'FrontEndController@getPage']);
