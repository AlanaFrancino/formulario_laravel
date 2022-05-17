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

Route::controller(CadastroController::class)->group(function(){
    Route::get('/','index')->name('index'); //busca a resposta da lista dos endereços dos usuarios

});

Route::group(['middleware' => ['check.idade']], function() {
    
    Route::controller(CadastroController::class)->group(function(){
        Route::post('/cadastro', 'store')->name('save'); //função de insert no banco os endereços
    });
         
});


