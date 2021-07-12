<?php


use Illuminate\Support\Facades\Route;
use\App\Mail\TestMail;
use App\Http\Requests\Soutenance as SoutenanceRequest;
use Illuminate\Http\Request;
use App\Models\Soutenance;
use App\Models\Salle;
use App\Models\Jury;
use App\Models\Etudiant;
use App\Models\Jury_soutenance;
use App\User;
use Illuminate\Support\Facades\DB;

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


   


Route::get('/', function () { return view('a_propos');});
Route::get('/etudiant.list','EtudiantController@index')->name('etudiant.list');
    

Route::get('/etudiant.create','EtudiantController@create')->name('etudiant.create');
Route::post('/etudiant.store','EtudiantController@store')->name('etudiant.store');
Route::get('/etudiant/{etudiant}','EtudiantController@show')->name('etudiant.show');
Route::delete('/etudiant/{etudiant}','EtudiantController@destroy')->name('etudiant.destroy');
Route::get('/etudiant.search','EtudiantController@search_student')->name('etudiant.search_soutenance');
Route::get('/etudiant_search.show{soutenance}','EtudiantController@show_soutenance')->name('etudiant_search.show');
Route::put('/etudiant.update{etudiant}', 'Etudiant@update')->name('etudiant.update'); 



/*
|--------------------------------------------------------------------------
| Admin page Routes
|--------------------------------------------------------------------------
|
*/


Route::group(['middleware' => 'auth','prefix' =>'admin'], function () {


    // Route::get('/message.create', 'MessageController@index')->name('message.create');
    // Route::post('/message', 'MessageController@SendMessageGoogle')->name('send.message.google');


    Route::get('/send-mail', function () {
        $details =[
            'title'=>'Mail from ITAgestionsoutenance.com',
            'body'=>'vous etes programme'
        ];
        Mail::to()->send(new TestMail($details));
        echo('email is sent');
    });

Route::get('/list_filiere', 'FiliereController@index')->name('list_filiere');
Route::get('/filiere.create', 'FiliereController@create')->name('filiere.create');
Route::post('/filiere.store', 'FiliereController@store')->name('filiere.store');
Route::get('/filiere/{filiere}/edit', 'FiliereController@edit')->name('filiere.edit');
Route::put('/filiere/{filiere}', 'FiliereController@update')->name('filiere.update'); 
Route::delete('/filiere/{filiere}', 'FiliereController@destroy')->name('filiere.destroy');
    

Route::get('/list_anneescolaire', 'AnneescolaireController@index')->name('list_anneescolaire');
Route::get('/anneescolaire.create', 'AnneescolaireController@create')->name('anneescolaire.create');
Route::post('/anneescolaire.store', 'AnneescolaireController@store')->name('anneescolaire.store');
Route::get('/anneescolaire/{anneescolaire}/edit', 'AnneescolaireController@edit')->name('anneescolaire.edit');
Route::put('/anneescolaire/{anneescolaire}', 'AnneescolaireController@update')->name('anneescolaire.update');
Route::delete('/anneescolaire/{anneescolaire}', 'AnneescolaireController@destroy')->name('anneescolaire.destroy');


Route::get('/list_niveau', 'NiveauController@index')->name('list_niveau');
Route::get('/niveau.create', 'NiveauController@create')->name('niveau.create');
Route::post('/niveau.store', 'NiveauController@store')->name('niveau.store');
Route::delete('/niveau.delete{niveau}', 'NiveauController@destroy')->name('niveau.destroy');
Route::get('/niveau/{niveau}/edit', 'NiveauController@edit')->name('niveau.edit'); 
Route::put('/niveau.update{niveau}', 'NiveauController@update')->name('niveau.update'); 


Route::get('/list_jury', 'JuryController@index')->name('list_jury');
Route::get('/jury.create', 'JuryController@create')->name('jury.create');
Route::post('/jury.store', 'JuryController@store')->name('jury.store');
Route::delete('/jury.delete{jury}', 'JuryController@destroy')->name('jury.destroy');
Route::get('/jury/{jury}/edit', 'JuryController@edit')->name('jury.edit'); 
Route::put('/jury.update{jury}', 'JuryController@update')->name('jury.update'); 


Route::get('/list_specialite', 'SpecialiteController@index')->name('list_specialite');
Route::get('/specialite.create', 'SpecialiteController@create')->name('specialite.create');
Route::post('/specialite.store', 'SpecialiteController@store')->name('specialite.store');
Route::delete('/specialite.delete{specialite}', 'SpecialiteController@destroy')->name('specialite.destroy');
Route::get('/specialite/{specialite}/edit', 'SpecialiteController@edit')->name('specialite.edit'); 
Route::put('/specialite.update{specialite}', 'SpecialiteController@update')->name('specialite.update'); 


Route::get('/list_departement', 'DepartementController@index')->name('list_departement');
Route::get('/departement.create', 'DepartementController@create')->name('departement.create');
Route::post('/departement.store', 'DepartementController@store')->name('departement.store');
Route::delete('/departement.delete{departement}', 'departementController@destroy')->name('departement.destroy');
Route::get('/departement/{departement}', 'DepartementController@edit')->name('departement.edit'); 
Route::put('/departement.update{departement}', 'DepartementController@update')->name('departement.update'); 


Route::get('/list_salle', 'SalleController@index')->name('list_salle');
Route::get('/salle.create', 'SalleController@create')->name('salle.create');
Route::post('/salle.store', 'SalleController@store')->name('salle.store');
Route::delete('/salle.delete{salle}', 'SalleController@destroy')->name('salle.destroy');
Route::get('/salle/{salle}/edit', 'SalleController@edit')->name('salle.edit'); 
Route::put('/salle.update{salle}', 'SalleController@update')->name('salle.update'); 


});


Route::get('/form_soutenance/{id}', 'SoutenanceController@index')->name('form_soutenance');
Route::get('/soutenance.create', 'SoutenanceController@create')->name('soutenance.create');
Route::post('/soutenance.store', 'SoutenanceController@store')->name('soutenance.store');
Route::get('/soutenance.show/{soutenance}', 'SoutenanceController@show')->name('soutenance.show');
Route::delete('/soutenance.delete{soutenance}', 'SoutenanceController@destroy')->name('soutenance.destroy');
Route::get('/soutenance/{soutenance}/edit', 'SoutenanceController@edit')->name('soutenance.edit'); 
Route::put('/soutenance.update{soutenance}', 'SoutenanceController@update')->name('soutenance.update'); 
Route::get('/soutenance.list', 'SoutenanceController@list')->name('soutenance.list'); 
Route::get('/search', 'SoutenanceController@search')->name('soutenance.search'); 
Route::get('/search_student', 'SoutenanceController@search_student')->name('soutenance.search_student'); 



Route::get('/admin', function () {
    return view('admin/homeadmin');
})->name('homeadmin')->middleware('auth');





     




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
