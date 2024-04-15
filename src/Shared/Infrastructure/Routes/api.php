<?php

use Ecommerce\BoundedContext\Backend\Infrastructure\Controllers\V1\PermissionsApiController;
use Ecommerce\BoundedContext\Backend\Infrastructure\Controllers\V1\RolesApiController;
use Ecommerce\BoundedContext\Backend\Infrastructure\Controllers\V1\UsersApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => config('setting.api'), 'as' => 'api.'], function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'throttle:60,1']], function () {
        Route::apiResource('permissions', PermissionsApiController::class)->only(['index', 'show']);
        Route::apiResource('roles', RolesApiController::class);
        Route::apiResource('users', UsersApiController::class);
    });

    Route::group(['prefix' => '{apiUser}', 'middleware' => ['auth:api_users', 'throttle:60,1']], function () {
        Route::get('health-check', function() {
           return response()->json(['status' => 'success'], 200);
        });
    });
});
