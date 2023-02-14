<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $table = "vagas";

    protected $fillable = ['area_atuacao','remuneracao', 'data_limite_procura', 'contato_email','contato_link',
        'contato_telefone', 'requisitos','descricao','observacoes','user_id','vaga_aprovada'];
}