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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'Carfix'], function() {

	Route::resource('details', 'DetailsController')->names('carfix.details');

	Route::resource('points', 'PointController')->names('carfix.points');

	Route::resource('requests', 'RequestController')->names('carfix.requests');

	Route::resource('calendar', 'CalendarController')->names('carfix.calendar');

});
