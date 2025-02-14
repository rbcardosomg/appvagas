<?php

namespace App\Providers;

use App\Models\Curso;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Vaga;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function(User $user){
            if($user->isAdmin())
                return true;
        });

        Gate::define('admin', function(User $user){
            return $user->isAdmin();
        });

        Gate::define('estagio', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('ensino', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ENSINO);
        });

        Gate::define('empresa', function(User $user){
            return $user->hasPerfil(Perfil::EMPRESA) || $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('view-vaga', function(User $user){
            //return $user->hasPerfil(Perfil::EMPRESA) || $user->hasPerfil(Perfil::SETOR_ESTAGIO);
            return true; // todos os perfis podem visualizar as vagas
        });

        Gate::define('new-vaga', function(User $user){
            return $user->hasPerfil(Perfil::EMPRESA) || $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('update-vaga', function(User $user, Vaga $vaga){
            return ((($user->hasPerfil(Perfil::EMPRESA) && $vaga->user == $user) || $user->hasPerfil(Perfil::SETOR_ESTAGIO)) && is_null($vaga->deleted_at));
        });

        Gate::define('delete-vaga', function(User $user, Vaga $vaga){
            return ((($user->hasPerfil(Perfil::EMPRESA) && $vaga->user == $user) || $user->hasPerfil(Perfil::SETOR_ESTAGIO)) && is_null($vaga->deleted_at));
        });

        Gate::define('aprovar-vaga', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('view-curso', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('new-curso', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('update-curso', function(User $user, Curso $vaga){
            return ($user->hasPerfil(Perfil::SETOR_ESTAGIO) && is_null($vaga->deleted_at));
        });

        Gate::define('delete-curso', function(User $user, Curso $vaga){
            return ($user->hasPerfil(Perfil::SETOR_ESTAGIO) && is_null($vaga->deleted_at));
        });

        Gate::define('usuario', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });
    }
}