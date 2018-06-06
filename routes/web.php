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

//Controlleurs utilisateurs
Route::resource("junior", 'JuniorController')->except(['create']);
Route::resource("senior", 'SeniorController')->except(['create']);
Route::resource("employe", 'EmployeController')->except(['create']);

//Controlleurs "métier"
Route::resource('intervention', 'InterventionController')->except(['create']);
Route::resource('formation', 'FormationController')->except(['create']);
Route::resource('requete', 'RequeteController')->except(['create']);
Route::resource('evaluationservice', 'EvaluationServiceController')->except(['create']);
Route::resource('rapportIntervention', 'RapportInterventionController')->except(['create']);
Route::resource('matiere', 'MatiereController')->except(['create']);
Route::resource('sujet', 'SujetController')->except(['create']);
Route::resource('forfait', 'ForfaitController')->except(['create']);
Route::resource('message', 'MessageController')->except(['create']);
Route::resource('notification', 'NotificationController')->except(['create']);


//Controlleurs publics
Route::resource('page', 'PageController')->except(['create']);