<?php

use App\Http\Controllers\{
    CursoController,
    EmpresaController,
    HomeController,
    UsuarioController,
    VagaController
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\MensagemAppMail;


Route::get('/', function () {
    return view('principal');
});

Auth::routes(['verify' => true]);

Route::prefix('admin')
        ->middleware('auth')
        ->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('vaga', VagaController::class)->middleware('can:vaga');
    Route::resource('empresa', EmpresaController::class)->middleware('can:empresa');
    Route::resource('curso', CursoController::class)->middleware('can:curso');
    Route::resource('usuario', UsuarioController::class)->middleware('can:usuario');
    Route::post('userStore', [EmpresaController::class,'userStore'])->middleware('can:usuario')->name('empresa.usuario.store');
});

Route::get('/mensagem-app', function() {
	return new MensagemAppMail();
});