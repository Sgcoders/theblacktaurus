<?php

Route::group(['namespace' => 'Botble\Ecommerce\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group([
            'prefix' => 'shipments',
            'permission' => 'shipments.index',
            'as' => 'ecommerce.shipments.'
        ], function () {
//            Route::get('', [
//                'as'   => 'index',
//                'uses' => 'ShipmentController@index',
//            ]);
            Route::resource('', 'ShipmentController')->parameters(['' => 'shipment'])->only(['index']);
            Route::get('edit/{id}', [
                'as'         => 'edit',
                'uses'       => 'ShipmentController@edit',
            ]);

            Route::post('update-status/{id}', [
                'as'         => 'update-status',
                'uses'       => 'ShipmentController@postUpdateStatus',
            ]);

            Route::post('update-cod-status/{id}', [
                'as'         => 'update-cod-status',
                'uses'       => 'ShipmentController@postUpdateCodStatus',
            ]);
        });
    });
});
