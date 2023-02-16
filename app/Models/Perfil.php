<?php

namespace App\Models;

enum Perfil: string
{
    case ADMIN = 'Admin';
    case SETOR_ESTAGIO = 'Setor de estágio';
    case SETOR_ENSINO = 'Setor de ensino';
    case EMPRESA = 'Empresa';

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
