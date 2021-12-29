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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
	'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
	Route::resource('companies', Admin\CompanyController::class, ['as' => 'admin']);
	Route::resource('employees', Admin\EmployeeController::class, ['as' => 'admin']);

	Route::group(['prefix' => 'ajax'], function() {
		Route::get('companies', Admin\CompanyDataController::class)->name('admin.ajax.companies');
	});
});
