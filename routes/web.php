<?php

use App\Http\Controllers\Admin\{
    CursoController,
    EmpresaController,
    HomeController,
    UsuarioController,
    VagaController
};
use App\Http\Controllers\Front\VagaController as FrontVagaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\MensagemAppMail;


Route::get('/', function () {
    return view('principal');
})->name('front_home');

Route::get('/setorestagio', function () {
    return view('setorestagio');
});
Route::get('/inicialempresa', function () {
    return view('inicialempresa');
});
Route::get('/inicialalunos', function () {
    return view('inicialalunos');
});

Route::get('/vagas', [FrontVagaController::class, 'index'])->name('front.vagas');
Route::match(['get','post'], '/vagas/filtered', [FrontVagaController::class,'filtrar'])->name('front.vagas.filtrar');
Route::get('/vagas/{vaga}', [FrontVagaController::class, 'show'])->name('front.vagas.show');

Auth::routes(['verify' => true]);

Route::prefix('admin')
        ->middleware('auth')
        ->group(function() {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::match(['get','post'], 'vaga/filtered', [VagaController::class,'filtrar'])->middleware('can:view-vaga')->name('vaga.filtrar');
    Route::resource('vaga', VagaController::class)->middleware('can:view-vaga');
    Route::resource('empresa', EmpresaController::class)->middleware('can:empresa');
    Route::resource('curso', CursoController::class)->middleware('can:view-curso');
    Route::resource('usuario', UsuarioController::class)->middleware('can:usuario');
    Route::post('userStore', [EmpresaController::class,'userStore'])->middleware('can:usuario')->name('empresa.usuario.store');
});

Route::get('/mensagem-app', function() {
	return new MensagemAppMail();
});