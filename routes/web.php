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
    include public_path() . '/frontend/index.html';
});

Route::get('/{name}', function ($name)
{
    include public_path() . '/frontend/' . $name;
})->where(['name' => '^(?!api).*$']);


Route::get('/{folder}/{resource}', function ($folder, $resource)
{
    include public_path() . '/frontend/' . $folder . '/' . $resource;
})->where(['folder' => '^(?!api).*$']);;

Route::group(['prefix' => 'api'], function()
{
    Route::post("login", 'AuthController@login');
    Route::resource('pages', 'PageController')->except(['create', 'edit', 'store', 'destroy']);
});

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function()
{
    Route::get("logout", 'AuthController@logout');

    // Controlleurs utilisateurs
    Route::resource("juniors", 'JuniorController')->except(['create', "store"]);
    Route::resource("seniors", 'SeniorController')->except(['create', "store"]);
    Route::resource("employes", 'EmployeController')->except(['create', "store"]);

    // Controlleurs "métier"
    Route::resource('interventions', 'InterventionController')->except(['create', 'edit']);
    Route::resource('formations', 'FormationController')->except(['create', 'edit']);
    Route::resource('requetes', 'RequeteController')->except(['create', 'edit']);
    Route::resource('evaluationservices', 'EvaluationServiceController')->except(['create', 'edit']);
    Route::resource('rapportinterventions', 'RapportInterventionController')->except(['create', 'edit']);
    Route::resource('matieres', 'MatiereController')->except(['create', 'edit']);
    Route::resource('sujets', 'SujetController')->except(['create', 'edit']);
    Route::resource('forfaits', 'ForfaitController')->except(['create', 'edit']);
    Route::resource('messages', 'MessageController')->except(['create', 'edit']);
    Route::resource('notifications', 'NotificationController')->except(['create', 'edit']);
});
