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

Route::group(['middleware' => 'auth'], function () {

      Route::group(['prefix'=>'radialistas', 'where'=>['id'=>'[0-9]+']], function() {
      Route::any("",             ['as' => 'radialistas',         'uses' => "RadialistasController@index"]);
      Route::get("create",       ['as' => 'radialistas.create',  'uses' => "RadialistasController@create"]);
      Route::get("{id}/destroy", ['as' => 'radialistas.destroy', 'uses' => "RadialistasController@destroy"]);
      Route::get("{id}/edit",    ['as' => 'radialistas.edit',    'uses' => "RadialistasController@edit"]);
      Route::put("{id}/update",  ['as' => 'radialistas.update',  'uses' => "RadialistasController@update"]);
      Route::post("store",       ['as' => 'radialistas.store',   'uses' => "RadialistasController@store"]);
      });

      Route::group(['prefix'=>'classificacoes', 'where'=>['id'=>'[0-9]+']], function() {
      Route::any("",             ['as' => 'classificacoes',         'uses' => "ClassificacaoEtariaController@index"]);
      Route::get("create",       ['as' => 'classificacoes.create',  'uses' => "ClassificacaoEtariaController@create"]);
      Route::get("{id}/destroy", ['as' => 'classificacoes.destroy', 'uses' => "ClassificacaoEtariaController@destroy"]);
      Route::get("{id}/edit",    ['as' => 'classificacoes.edit',    'uses' => "ClassificacaoEtariaController@edit"]);
      Route::put("{id}/update",  ['as' => 'classificacoes.update',  'uses' => "ClassificacaoEtariaController@update"]);
      Route::post("store",       ['as' => 'classificacoes.store',   'uses' => "ClassificacaoEtariaController@store"]);
      });

      Route::group(['prefix'=>'eventos', 'where'=>['id'=>'[0-9]+']], function() {
      Route::any("",             ['as' => 'eventos',         'uses' => "TipoEventoController@index"]);
      Route::get("create",       ['as' => 'eventos.create',  'uses' => "TipoEventoController@create"]);
      Route::get("{id}/destroy", ['as' => 'eventos.destroy', 'uses' => "TipoEventoController@destroy"]);
      Route::get("{id}/edit",    ['as' => 'eventos.edit',    'uses' => "TipoEventoController@edit"]);
      Route::put("{id}/update",  ['as' => 'eventos.update',  'uses' => "TipoEventoController@update"]);
      Route::post("store",       ['as' => 'eventos.store',   'uses' => "TipoEventoController@store"]);
      });

      Route::group(['prefix'=>'programas', 'where'=>['id'=>'[0-9]+']], function() {
      Route::any("",             ['as' => 'programas',            'uses' => "ProgramaController@index"]);
      Route::get("realrorio",    ['as' => 'programas.relatorio',  'uses' => "ProgramaController@geraPdf"]);
      Route::get("create",       ['as' => 'programas.create',     'uses' => "ProgramaController@create"]);
      Route::get("{id}/destroy", ['as' => 'programas.destroy',    'uses' => "ProgramaController@destroy"]);
      Route::get("{id}/edit",    ['as' => 'programas.edit',       'uses' => "ProgramaController@edit"]);
      Route::put("{id}/update",  ['as' => 'programas.update',     'uses' => "ProgramaController@update"]);
      Route::post("store",       ['as' => 'programas.store',      'uses' => "ProgramaController@store"]);

      Route::get('createmaster', ['as'=>'programas.createmaster', 'uses'=>'ProgramaController@createmaster']);
      Route::post('masterdetail', ['as'=>'programas.masterdetail', 'uses'=>'ProgramaController@masterdetail']);
      Route::post('{idRad}/{id}/destroyRad', ['as'=>'programas.destroyRad', 'uses'=>'ProgramaController@removeRadialista']);
      });
});
