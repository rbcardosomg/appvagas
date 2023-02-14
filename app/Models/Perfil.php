<?php

namespace App\Models;

enum Perfil
{
    case ADMIN;
    case SETOR_ESTAGIO;
    case SETOR_ENSINO;
    case EMPRESA;

    public function getName(): string
    {
        return $this->name;
    }
}
