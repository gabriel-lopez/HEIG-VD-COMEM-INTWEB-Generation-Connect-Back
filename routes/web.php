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

Route::get('/', function ()
{
    return view('welcome');
});

Route::prefix('api')->group(function ()  // api/route
{
    // Controlleurs utilisateurs
    Route::resource("juniors", 'JuniorController')->except(['create']);
    Route::resource("seniors", 'SeniorController')->except(['create']);
    Route::resource("employes", 'EmployeController')->except(['create']);

    // Controlleurs "métier"
    Route::resource('interventions', 'InterventionController')->except(['create']);
    Route::resource('formations', 'FormationController')->except(['create']);
    Route::resource('requetes', 'RequeteController')->except(['create']);
    Route::resource('evaluationservices', 'EvaluationServiceController')->except(['create']);
    Route::resource('rapportInterventions', 'RapportInterventionController')->except(['create']);
    Route::resource('matieres', 'MatiereController')->except(['create']);
    Route::resource('sujets', 'SujetController')->except(['create']);
    Route::resource('forfaits', 'ForfaitController')->except(['create']);
    Route::resource('messages', 'MessageController')->except(['create']);
    Route::resource('notifications', 'NotificationController')->except(['create']);

    // Controlleurs publics
    Route::resource('pages', 'PageController')->except(['create']);
});
