<?php

Route::group(['as' => 'api.', 'namespace' => 'API'], function () {

    Route::resource('options', 'OptionAPIController');


    Route::group(['middleware' => 'auth:api'], function () {

        Route::resource('permissions', 'PermissionAPIController');

        Route::resource('roles', 'RoleAPIController');

        Route::resource('users', 'UserAPIController');
        Route::get('user/add/shortcut/{user}', 'UserAPIController@addShortcut')->name('users.add_shortcut');
        Route::get('user/remove/shortcut/{user}', 'UserAPIController@removeShortcut')->name('users.remove_shortcut');

        Route::resource('areas', 'AreaAPIController');

        Route::resource('cargos', 'CargoAPIController');

        Route::resource('monedas', 'MonedaAPIController');

        Route::resource('proveedores', 'ProveedorAPIController');

        Route::resource('licitaciones', 'LicitacionAPIController');

        Route::resource('contrato_estados', 'ContratoEstadoAPIController');

        Route::resource('contrato_tipos', 'ContratoTipoAPIController');

        Route::resource('contrato_items', 'ContratoItemAPIController');

        Route::resource('orden_compra_tipos', 'OrdenCompraTipoAPIController');

        Route::resource('unidad_monetarias', 'UnidadMonetariaAPIController');

        Route::resource('despacho_tipos', 'DespachoTipoAPIController');

        Route::resource('forma_pagos', 'FormaPagoAPIController');

        Route::resource('oc_mercado_publicos', 'OcMercadoPublicoAPIController');

        Route::resource('oc_mercado_publico_items', 'OcMercadoPublicoItemAPIController');

        Route::resource('oc_mp_tipo_orden_compras', 'OcMercadoPublicoTipoOrdenCompraAPIController');

        Route::resource('oc_mercado_publico_tipo_monedas', 'OcMercadoPublicoTipoMonedaAPIController');

        Route::resource('oc_mp_tipo_despachos', 'OcMercadoPublicoTipoDespachoAPIController');

        Route::resource('oc_mercado_public_tipo_pagos', 'OcMercadoPublicTipoPagoAPIController');
    });

});
