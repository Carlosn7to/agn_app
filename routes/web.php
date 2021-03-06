<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\WebController::class,'home'])->name('web.home');

Route::prefix('/actions')->group(function()
{
    Route::post('/login', [\App\Http\Controllers\ActionsController::class, 'login'])->name('action.login');
});

Route::middleware(\App\Http\Middleware\ValidationMiddleware::class)->prefix('/app')->group(function () {

    Route::get('/', [\App\Http\Controllers\AppController::class,'home'])->name('app.home');

    Route::prefix('/formularios')->group(function ()
    {
        Route::get('/', [\App\Http\Controllers\FormsController::class,'home'])->name('app.forms');

        Route::prefix('/actions')->group(function ()
        {
            Route::post('/new', [\App\Http\Controllers\FormsController::class, 'new'])->name('forms.new');
        });
    });

    Route::prefix('planilhas')->group(function ()
    {
       Route::get('', [\App\Http\Controllers\Worksheets\WorksheetController::class,'index'])->name('app.worksheets');
    });

    Route::prefix('/gerenciamento')->group(function ()
    {
        Route::get('/formularios', [\App\Http\Controllers\ManagementController::class,'forms'])->name('app.management.forms');
    });

});
