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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

$int = '^\d+$';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::pattern('loan', $int);

Route::group(['prefix' => '/loans', 'as' => 'loans.'], function () {

    Route::get('/', 'LoanController@index')->name('index');
    Route::get('/{loan}', 'LoanController@show')->name('show');
    Route::get('/create', 'LoanController@create')->name('create');
    Route::post('/', 'LoanController@store')->name('store');
    // Update, edit existing
    Route::get('/{loan}/edit', 'LoanController@edit')->name('edit');
    Route::put('/{loan}', 'LoanController@update')->name('update');
    // Update, edit existing
    Route::get('/{loan}/profile', 'LoanController@showProfile')->name('profile.index');
    Route::put('/{loan}/Profile', 'LoanController@updateProfile')->name('profile');
    // Delete, remove
    Route::put('/{loan}/revoke', 'LoanController@revoke')->name('revoke');
    Route::put('/{loan}/restore', 'LoanController@restore')->name('restore');
    Route::delete('/{loan}', 'LoanController@destroy')->name('destroy');

});

Route::pattern('statement', $int);

Route::group(['prefix' => '/statements', 'as' => 'statements.'], function () {

    Route::get('/', 'StatementController@index')->name('index');
    Route::get('/{statement}', 'StatementController@show')->name('show');
    Route::get('/create', 'StatementController@create')->name('create');
    Route::post('/', 'StatementController@store')->name('store');
    // Update, edit existing
    Route::get('/{statement}/edit', 'StatementController@edit')->name('edit');
    Route::put('/{loan}', 'StatementController@update')->name('update');
    Route::delete('/{statement}', 'StatementController@destroy')->name('destroy');

});

