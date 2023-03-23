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
Route::get('/pages', [\App\Http\Controllers\Api\PageIndexController::class, 'index']);
Route::get('/pages/{page}', [\App\Http\Controllers\Api\PageIndexController::class, 'show'])->name('api.pages.show');
Route::get('/events', [\App\Http\Controllers\Api\EventIndexController::class, 'index']);
Route::get('/events/{event}', [\App\Http\Controllers\Api\EventIndexController::class, 'show'])->name('api.events.show');
Route::get('/wives', [\App\Http\Controllers\Api\WivesIndexController::class, 'index']);
Route::get('/wives/{wife}', [\App\Http\Controllers\Api\WivesIndexController::class, 'show'])->name('api.wives.show');
Route::get('/children', [\App\Http\Controllers\Api\ChildrenIndexController::class, 'index']);
Route::get('/children/{child}', [\App\Http\Controllers\Api\ChildrenIndexController::class, 'show'])->name('api.children.show');
Route::get('/people', [\App\Http\Controllers\Api\PeopleIndexController::class, 'index']);
Route::get('/people/{person slug}', [\App\Http\Controllers\Api\PeopleIndexController::class, 'show'])->name('api.people.show');
Route::get('/documents', [\App\Http\Controllers\Api\DocumentIndexController::class, 'index']);
Route::get('/documents/{document}', [\App\Http\Controllers\Api\DocumentIndexController::class, 'show'])->name('api.documents.show');
Route::get('/places', [\App\Http\Controllers\Api\PlaceIndexController::class, 'index']);
Route::get('/places/{place}', [\App\Http\Controllers\Api\PlaceIndexController::class, 'show'])->name('api.places.show');
Route::get('/topics', [\App\Http\Controllers\Api\TopicIndexController::class, 'index']);
Route::get('/topics/{topic}', [\App\Http\Controllers\Api\TopicIndexController::class, 'show'])->name('api.topics.show');
