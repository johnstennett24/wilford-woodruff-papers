<?php

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::get('/subjects/{subject}', [\App\Http\Controllers\SubjectController::class, 'show'])->name('api.subjects.show');*/
Route::get('/pages', [\App\Http\Controllers\Api\DocumentIndexController::class, 'index']);
Route::get('/events',[\App\Http\Controllers\Api\EventIndexController::class, 'index']);
Route::get('/wives', [\App\Http\Controllers\Api\WivesIndexController::class, 'index']);
Route::get('/children',[\App\Http\Controllers\Api\ChildrenIndexController::class, 'index']);


