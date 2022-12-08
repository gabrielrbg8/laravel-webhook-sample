<?php

use App\Http\Controllers\ActivityLogs\ActivityLogController;
use App\Http\Controllers\Webhooks\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::apiResource('webhooks', WebhookController::class)->except(['destroy', 'update', 'show']);
Route::apiResource('activity-logs', ActivityLogController::class)->only(['index', 'show']);
