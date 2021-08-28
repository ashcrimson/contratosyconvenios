<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('pruebas',"PruebaController@index");


Route::group(['middleware' => ['auth']], function () {


    Route::group(['prefix' => 'dev','as' => 'dev.'],function (){

        Route::get('prueba/api','PruebaApiController@index')->name('prueba.api');

        Route::get('passport/clients', 'PassportClientsController@index')->name('passport.clients');

        Route::resource('configurations', 'ConfigurationController');

    });


    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/calendar', 'HomeController@calendar')->name('calendar');


    Route::get('profile/business', 'BusinessProfileController@index')->name('profile.business');
    Route::post('profile/business', 'BusinessProfileController@store')->name('profile.business.store');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::post('profile/{user}/edit/avatar', 'ProfileController@editAvatar')->name('profile.edit.avatar');

    Route::resource('users', 'UserController');
    Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
    Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

    Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
    Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
    Route::resource('options',"OptionController");

    Route::get('documentos/descargar/{documento}',"DocumentoController@descargar")->name('documentos.descargar');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('areas', 'AreaController');

    Route::resource('cargos', 'CargoController');

    Route::resource('monedas', 'MonedaController');

    Route::resource('proveedors', 'ProveedorController');

    Route::resource('licitaciones', 'LicitacionController');

    Route::resource('contratoEstados', 'ContratoEstadoController');

    Route::resource('contratoTipos', 'ContratoTipoController');

    Route::resource('contratos', 'ContratoController');

    Route::post('contratos/asignar/area/{contrato}', 'ContratoController@asignarArea')->name('contratos.asignar.area');
    Route::post('contratos/asignar/cargo/{contrato}', 'ContratoController@asignarCargo')->name('contratos.asignar.cargo');

    Route::get('contratos/bitacoras/{contrato}', 'ContratoController@bitacoraVista')->name('contratos.bitacora.vista');
    Route::post('contratos/bitacoras/{contrato}/store', 'ContratoController@bitacoraStore')->name('contratos.bitacora.store');
    Route::get('contratos/bitacoras/{contrato}/edit', 'ContratoController@bitacoraEdit')->name('contratos.bitacora.edit');
    Route::put('contratos/bitacoras/{contrato}/update', 'ContratoController@bitacoraUpdate')->name('contratos.bitacora.update');
    Route::delete('contratos/bitacoras/{contrato}/{bitacora}/destroy', 'ContratoController@bitacoraDestroy')->name('contratos.bitacora.destroy');

    Route::resource('ordenCompraEstados', 'OrdenCompraEstadoController');

    Route::resource('ordenCompras', 'OrdenCompraController');

    Route::patch('ordenCompras/anular/{compra}', 'OrdenCompraController@anular')->name('ordenCompras.anular');
});
