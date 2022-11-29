<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MensagemAppMail;


Route::get('/', function () {
    return view('principal');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::resource('estagiovaga', 'App\Http\Controllers\EstagioVagaController')
    ->middleware('verified');

Route::resource('empresa', 'App\Http\Controllers\EmpresaController')
    ->middleware('verified');



    

Route::get('/mensagem-app', function() {
	return new MensagemAppMail();
   // Mail::to('rogerio.canto@ifmg.edu.br')->send(new MensagemAppMail());
    //return 'E-mail enviado com sucesso';
});

