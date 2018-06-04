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
    return view('welcome');
});


Route::resource("junior", 'JuniorsController');
Route::resource("senior", 'SeniorsController');
Route::resource("employe", 'EmployeesController');


Route::resource('intervention', 'InterventionsController');
Route::resource('formation', 'FormationsController');
Route::resource('request', 'RequestsController');

Route::resource('page', 'PagesController');

Route::resource('feedback', 'FeedbacksController');
Route::resource('report', 'ReportsController');


Route::resource('topic', 'TopicsController');
Route::resource('subject', 'SubjectsController');

Route::resource('subscription', 'SubscriptionsController');
Route::resource('message', 'MessagesController');
Route::resource('notification','NotificationsController');
