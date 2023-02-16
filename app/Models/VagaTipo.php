<?php

namespace App\Models;

enum VagaTipo
{
    case estagio;
    case emprego;

    public function getName(): string
    {
        return $this->name != 'estagio' ? $this->name : 'estágio';
    }
}
