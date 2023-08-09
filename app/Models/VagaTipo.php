<?php

namespace App\Models;

enum VagaTipo:string
{
    case estagio = 'Estágio';
    case emprego = 'Emprego';

    public static function get(string $value): string
    {
        foreach (VagaTipo::cases() as $vaga_tipo) {
            if($vaga_tipo->name == $value)
                return $vaga_tipo->value;
        }
    }
}