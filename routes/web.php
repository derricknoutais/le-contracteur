<?php
use App\Voiture;
use App\Mail\Welcome;
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
Route::post('/reservations', 'ReservationController@store');

Route::get('/mail', function () {
    $user = App\User::first();
    $user->notify(new App\Notifications\VoitureReservee);
});

Route::get('/', function () {
        $voitures = Voiture::where('disponibilite', 1)->get()->sortBy('prix');
        return view('home', compact('voitures'));
});

Auth::routes();
Route::middleware(['auth'])->group(function(){
    Route::get('/hi/create/', 'ContratsController@create');
    Route::get('/hi/create/{voiture_id}', 'ContratsController@create2');
    Route::get('/hi/{client_id}/create', 'ContratsController@create');
    Route::get('/hi', 'ContratsController@index');
    Route::resource('hi', 'ContratsController');

    Route::get('/hi/edit/{contrat}', 'ContratsController@edit2');

    Route::put('/hi/retourner/{id}', 'ContratsController@retourner')->name('hi.retourner');


    Route::resource('voitures', 'VoituresController');

    Route::resource('clients', 'ClientsController');

    Route::resource('payements', 'PayementsController');
    Route::get('/payements/create/{contrat_id}', 'PayementsController@create2');

    Route::resource('dashboard', 'DashboardController');
});


Route::get('/home', 'HomeController@index')->name('home');
