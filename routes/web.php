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
Route::resource("junior", 'JuniorController');
Route::resource("senior", 'SeniorController');
Route::resource("employe", 'EmployeController');

//Controlleurs "métier"
Route::resource('intervention', 'InterventionController');
Route::resource('formation', 'FormationController');
Route::resource('requete', 'RequeteController');
Route::resource('evaluationservice', 'EvaluationServiceController');
Route::resource('rapportIntervention', 'RapportInterventionController');
Route::resource('matiere', 'MatiereController');
Route::resource('sujet', 'SujetController');
Route::resource('forfait', 'ForfaitController');
Route::resource('message', 'MessageController');
Route::resource('notification', 'NotificationController');


//Controlleurs publics
Route::resource('page', 'PageController');