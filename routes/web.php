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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test');
Route::get('/animals', 'HomeController@getAnimals')->name('get.animals');
Route::get('/animals/reserve', 'GyvunasController@reserve');
Route::get('/animals/my', 'GyvunasController@index');
Route::get('/animals/create', 'GyvunasController@create');
Route::post('/animals', 'GyvunasController@store')->name('animals.store');
Route::delete('animals/{gyvunas}', 'GyvunasController@destroy')->name('animals.destroy');
Route::get('/animals/{gyvunas}', 'GyvunasController@show');
Route::patch('/animals/{gyvunas}', 'GyvunasController@modify')->name('animals.modify');
Route::patch('/animals/reserve/{gyvunas}', 'GyvunasController@modifyUndo')->name('animals.modifyUndo');
