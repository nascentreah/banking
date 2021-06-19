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

Auth::routes(['verify' => true]);

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

    Route::get('/', 'AccountStatementController@index')->name('index');
    Route::get('/{statement}', 'AccountStatementController@show')->name('show');
    Route::get('/create', 'AccountStatementController@create')->name('create');
    Route::post('/', 'AccountStatementController@store')->name('store');
    // Update, edit existing
    Route::get('/{statement}/edit', 'AccountStatementController@edit')->name('edit');
    Route::put('/{statement}', 'AccountStatementController@update')->name('update');
    Route::delete('/{statement}', 'AccountStatementController@destroy')->name('destroy');

});

Route::pattern('deposit', $int);

Route::group(['prefix' => '/deposits', 'as' => 'deposits.'], function () {

    Route::get('/', 'DepositController@index')->name('index');
    Route::get('/{deposit}', 'DepositController@show')->name('show');
    Route::get('/create', 'DepositController@create')->name('create');
    Route::post('/', 'DepositController@store')->name('store');
    // Update, edit existing
    Route::get('/{deposit}/edit', 'DepositController@edit')->name('edit');
    Route::put('/{deposit}', 'DepositController@update')->name('update');
    Route::delete('/{deposit}', 'DepositController@destroy')->name('destroy');

});

Route::pattern('withdraw', $int);

Route::group(['prefix' => '/withdraws', 'as' => 'withdraws.'], function () {

    Route::get('/', 'WithdrawController@index')->name('index');
    Route::get('/{withdraw}', 'WithdrawController@show')->name('show');
    Route::get('/create', 'WithdrawController@create')->name('create');
    Route::post('/', 'WithdrawController@store')->name('store');
    // Update, edit existing
    Route::get('/{withdraw}/edit', 'WithdrawController@edit')->name('edit');
    Route::put('/{withdraw}', 'WithdrawController@update')->name('update');
    Route::delete('/{withdraw}', 'WithdrawController@destroy')->name('destroy');

});


Route::pattern('transfer', $int);

Route::group(['prefix' => '/transfers', 'as' => 'transfers.'], function () {

    Route::get('/', 'TransferController@index')->name('index');
    Route::get('/{transfer}', 'TransferController@show')->name('show');
    Route::get('/create', 'TransferController@create')->name('create');
    Route::post('/', 'TransferController@store')->name('store');
    // Update, edit existing
    Route::get('/{transfer}/edit', 'TransferController@edit')->name('edit');
    Route::put('/{transfer}', 'TransferController@update')->name('update');
    Route::delete('/{transfer}', 'TransferController@destroy')->name('destroy');

});

Route::pattern('saving', $int);

Route::group(['prefix' => '/savings', 'as' => 'savings.'], function () {

    Route::get('/', 'SavingController@index')->name('index');
    Route::get('/{saving}', 'SavingController@show')->name('show');
    Route::get('/create', 'SavingController@create')->name('create');
    Route::post('/', 'SavingController@store')->name('store');
    // Update, edit existing
    Route::get('/{saving}/edit', 'SavingController@edit')->name('edit');
    Route::put('/{saving}', 'SavingController@update')->name('update');
    Route::delete('/{saving}', 'SavingController@destroy')->name('destroy');

});




