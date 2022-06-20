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

Route::get('formularios/all', [\App\Http\Controllers\FormsController::class, 'all_forms'])->name('api.form.all');

Route::middleware(\App\Http\Middleware\VerifyHash::class)->prefix('formularios')->group(function() {

    Route::post('perguntas/escolhas', [\App\Http\Controllers\FormsController::class, 'get_form_questions_answers'])->name('api.form.questions.answers');
    Route::post('/editar', [\App\Http\Controllers\FormsController::class, 'edit_form'])->name('api.form.edit');
    Route::post('/new', [\App\Http\Controllers\FormsController::class,'new'])->name('api.form.new');
    Route::post('update/', [\App\Http\Controllers\FormsController::class, 'update_status_form'])->name('api.form.update.status');

    Route::prefix('perguntas')->group(function ()
    {
        Route::post('/', [\App\Http\Controllers\FormsController::class, 'get_questions_answers'])->name('api.questions.answers');
        Route::post('/edit/status', [\App\Http\Controllers\FormsController::class, 'edit_question_status'])->name('api.questions.edit.status');
        Route::post('/edit', [\App\Http\Controllers\FormsController::class, 'edit_question'])->name('api.questions.edit');

        Route::prefix('escolhas')->group(function()
        {
            Route::post('/delete', [\App\Http\Controllers\FormsController::class, 'delete_answer'])->name('api.answers.delete');
        });
    });
});

Route::post('formularios/adicionar/perguntas', [\App\Http\Controllers\FormsController::class, 'add_form_questions_answers'] )->name('api.form.add.questions');


Route::get('formularios', [\App\Http\Controllers\FormsController::class, 'index'])->name('api.form.list');

Route::get('formularios/{id?}', [\App\Http\Controllers\FormsController::class, 'questions_index'])->name('api.questions.list');
