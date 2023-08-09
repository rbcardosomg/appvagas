<?php

namespace App\Models;

enum CursoTipo: string
{
    case superior = 'Superior';
    case tecnico = 'Técnico';

    public static function get(string $value): string
    {
        foreach (CursoTipo::cases() as $curso_tipo) {
            if($curso_tipo->name == $value)
                return $curso_tipo->value;
        }
    }
}