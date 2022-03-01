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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('createNote', [\App\Http\Controllers\NoteController::class, 'create']);
Route::post('updateNote', [\App\Http\Controllers\NoteController::class, 'update']);
Route::post('deleteNote', [\App\Http\Controllers\NoteController::class, 'delete']);
Route::get('getNote', [\App\Http\Controllers\NoteController::class, 'getAllNotes']);
Route::post('getNoteWithID', [\App\Http\Controllers\NoteController::class, 'getNoteWithID']);
