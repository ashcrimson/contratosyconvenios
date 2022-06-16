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
    Route::get('documentos/eliminar/{documento}',"DocumentoController@eliminar")->name('documentos.eliminar');

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('areas', 'AreaController');
    Route::post('areas/{area}/restore', 'AreaController@restore')->name('areas.restore');

    Route::resource('cargos', 'CargoController');

    Route::resource('monedas', 'MonedaController');

    Route::resource('proveedors', 'ProveedorController');

    Route::resource('licitaciones', 'LicitacionController');

    Route::resource('contratoEstados', 'ContratoEstadoController');

    Route::resource('contratoTipos', 'ContratoTipoController');

    Route::resource('contratos', 'ContratoController');

    Route::group(['prefix' => 'contratos','as' => 'contratos.'],function (){
        Route::post('asignar/area/{contrato}', 'ContratoController@asignarArea')->name('asignar.area');
        Route::post('asignar/cargo/{contrato}', 'ContratoController@asignarCargo')->name('asignar.cargo');

        Route::get('bitacoras/{contrato}', 'ContratoController@bitacoraVista')->name('bitacora.vista');
        Route::post('bitacoras/{contrato}/store', 'ContratoController@bitacoraStore')->name('bitacora.store');
        Route::get('bitacoras/{contrato}/edit', 'ContratoController@bitacoraEdit')->name('bitacora.edit');
        Route::put('bitacoras/{contrato}/update', 'ContratoController@bitacoraUpdate')->name('bitacora.update');
        Route::delete('bitacoras/{contrato}/{bitacora}/destroy', 'ContratoController@bitacoraDestroy')->name('bitacora.destroy');

        Route::get('detalles/{contrato}', 'ContratoController@adminItems')->name('admin.items');

    });

    Route::resource('ordenCompraEstados', 'OrdenCompraEstadoController');

    Route::resource('ordenCompras', 'OrdenCompraController');

    Route::patch('ordenCompras/anular/{compra}', 'OrdenCompraController@anular')->name('ordenCompras.anular');

    Route::resource('ordenCompraTipos', 'OrdenCompraTipoController');

    Route::resource('unidadMonetarias', 'UnidadMonetariaController');

    Route::resource('despachoTipos', 'DespachoTipoController');

    Route::resource('formaPagos', 'FormaPagoController');

    Route::resource('ocMercadoPublicos', 'OcMercadoPublicoController');

    Route::group(['prefix' => 'ocMercadoPublicos','as' => 'ocMercadoPublicos.'],function (){

        Route::get('bitacoras/{ocMercadoPublico}', 'OcMercadoPublicoController@bitacoraVista')->name('bitacora.vista');
        Route::post('bitacoras/{ocMercadoPublico}/store', 'OcMercadoPublicoController@bitacoraStore')->name('bitacora.store');
        Route::delete('bitacoras/{ocMercadoPublico}/{bitacora}/destroy', 'OcMercadoPublicoController@bitacoraDestroy')->name('bitacora.destroy');

    });

    Route::get('ocMercadoPublicos/cargar/show', 'OcMercadoPublicoController@carga')->name('ocMercadoPublicos.carga');
    Route::post('ocMercadoPublicos/cargar/store', 'OcMercadoPublicoController@cargaStore')->name('ocMercadoPublicos.carga.store');

    Route::get('ocMercadoPublicos/cargar/show2', 'OcMercadoPublicoController@carga2')->name('ocMercadoPublicos.carga2');
    Route::post('ocMercadoPublicos/cargar/store2', 'OcMercadoPublicoController@cargaStore2')->name('ocMercadoPublicos.carga.store2');
});
