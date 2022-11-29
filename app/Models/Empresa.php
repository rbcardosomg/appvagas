<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nome','documento', 'area_atuacao_empresa', 'telefone','rua',
        'bairro', 'numero','cidade','estado'];
       
}
