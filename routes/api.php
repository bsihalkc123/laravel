<?php
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    // Roles
    Route::apiResource('roles', RoleController::class)->except(['create', 'edit']);

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::post('/permissions', [PermissionController::class, 'store']);
});