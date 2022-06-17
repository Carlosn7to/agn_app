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

Route::get('users/{id?}', [\App\Http\Controllers\UserController::class, 'user'])->name('api.user');

Route::get('formularios', [\App\Http\Controllers\FormsController::class, 'index'])->name('api.form.list');

Route::get('formularios/{id?}', [\App\Http\Controllers\FormsController::class, 'questions_index'])->name('api.questions.list');
