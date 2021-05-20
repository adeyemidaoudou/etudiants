<?php

use App\Http\Controllers\DossierController;

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


Route::resource('dossiers', 'DossierController');

Route::get('/dossiers_all', 'DossierController@tousDossiers')->name('dossiers.tout');
Route::get('/dossiers_selectionnes', 'DossierController@dossiersSelecionnes')->name('dossiers.selectionnes');
Route::get('/dossiers_valides', 'DossierController@dossiersValides')->name('dossiers.valides');
Route::post('/dossiers_selection/{id}', 'DossierController@selection')->name('dossier.selection');
Route::post('/dossiers_validation/{id}', 'DossierController@validation')->name('dossier.validation');


Auth::routes();

Route::post('/registerUser', 'Auth\RegisterController@userRegister')->name('userRegister');
Route::post('/loginUser', 'Auth\LoginController@Login')->name('userLogin');


Route::get('/etudiants/dashboard', 'UserController@etudiantDashboard')->name('etudiants.dashboard');
Route::get('/promoteurs/dashboard', 'UserController@promoteurDashboard')->name('promoteurs.dashboard');
Route::get('/agents/dashboard', 'UserController@agentDashboard')->name('agents.dashboard');




Route::get('/home', 'HomeController@index')->name('home');
