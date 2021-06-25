<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use Resources\Views\Eventos;

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

Route::get('/login', function () {
    return view ('login');
});



//Não sei porque não carrega as imagens e o CSS - faltava a extensão .blade
Route::get('/frontend', function () {
    return view ('index');
});
//Route::view('/frontend', 'index'); // doc do Laravel


//Tentando edit
/*
Route::get('/eventos/edit', function () {
    return view ('form_edicao');
});
*/
/*
//Tentando edit2
Route::get('/eventos/edit/{evento}', function (App\Evento $evento) {
	return view('eventos.edit', ['evt' => $evento]);
})->name('evento.edit');
*/

//Tentando edit3-Larback
Route::get('/eventos/novo','EventosController@create');
Route::post('/eventos/novo', 'EventosController@store')->name('salvarEvento');

//Tentando edit3-Larback - alterando
//Route::get('/eventos/create','EventosController@create');
//Route::post('/eventos/create', 'EventosController@store')->name('salvarEvento');


//Larback delete
Route::get('/eventos/del/{id}','EventosController@destroy')->name('excluirEvento');

//Larback
Route::get('/eventos/edit/{id}', 'EventosController@edit')->name('editarEvento');
Route::post('/eventos/edit/{id}', 'EventosController@update')->name('atualizarEvento');






// ***********
// FUNCIONANDO
Route::view('/eventos', 'eventosCadastrados'); // doc do Laravel

//Route::view('/eventos/edit', 'form_edicao'); // doc do Laravel
//Estava dando conflito com a linha 56(edit) ou 57(update)
#Route::view('/eventos/edit/{id}', 'eventos.form_edicao'); 


//Esta linha está dando aquele pau no php artisan route:list !
//Route::resource('eventos', EventosController::class); // está no doc do Laravel
// Substituir por esta:
Route::resource('/eventos', 'EventosController');

