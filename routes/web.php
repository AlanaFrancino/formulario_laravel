<?php

use App\Http\Controllers\CadastroController;
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

Route::prefix('/')->name('cadastro.')->group(function(){
    Route::controller(CadastroController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/retorno/{id}', 'retorno')->name('retorno');
        Route::group([
            'middleware' => 'check.idade',
        ], function ($router) {
            Route::post('/cadastro', 'store')->name('store');
        });

    });
});
Route::get('/tabela', function () {
    return view('tabela');
});



