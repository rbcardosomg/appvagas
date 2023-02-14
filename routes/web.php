<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\MensagemAppMail;


Route::get('/', function () {
    return view('principal');
});

Auth::routes();

Route::prefix('admin')
        ->middleware('auth')
        ->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('vaga', VagaController::class)->middleware(['can:empresa,estagio']);
    Route::resource('empresa', EmpresaController::class)->middleware(['can:empresa,estagio']);
});

Route::get('/mensagem-app', function() {
	return new MensagemAppMail();
});