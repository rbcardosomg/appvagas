<?php

namespace App\Models;

enum VagaStatus:string
{
    case ANALISE = 'Em análise';
    case APROVADA = 'Aprovada';

    public static function get(string $value): string
    {
        foreach (VagaStatus::cases() as $vaga_status) {
            if($vaga_status->name == $value)
                return $vaga_status->value;
        }
    }
}