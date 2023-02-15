<?php

namespace App\Providers;

use App\Models\Perfil;
use App\Models\User;
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

        Gate::define('vaga', function(User $user){
            return $user->hasPerfil(Perfil::EMPRESA) || $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });

        Gate::define('usuario', function(User $user){
            return $user->hasPerfil(Perfil::SETOR_ESTAGIO);
        });
    }
}