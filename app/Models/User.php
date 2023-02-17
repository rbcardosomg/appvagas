<?php

namespace App\Models;

use App\Notifications\RedefinirSenhaNotification;
use App\Notifications\VerificarEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'empresa_id',
        'perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenhaNotification($token, $this->email, $this->name));
    }

    public function sendEmailVerificationNotification()
    {
       $this->notify(new VerificarEmailNotification($this->name));  
    }

    public function isAdmin(): bool
    {
        return $this->hasPerfil(Perfil::ADMIN);
    }

    public function isEmpresa(): bool
    {
        return $this->hasPerfil(Perfil::EMPRESA);
    }

    public function hasPerfil(Perfil $perfil): bool
    {
        return $this->perfil === $perfil->name;
    }

    public function getPerfil(): Perfil
    {
        $perfis = Perfil::cases();
        $user_perfil = null;
        foreach ($perfis as $perfil) {
            if($this->perfil == $perfil->name)
            $user_perfil = $perfil;
        }
        return $user_perfil;
    }
}