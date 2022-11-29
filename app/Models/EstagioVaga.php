<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstagioVaga extends Model
{
    use HasFactory;

    protected $table = "estagiovagas";

    protected $fillable = ['area_atuacao','remuneracao', 'data_limite_procura', 'contato_email','contato_link',
        'contato_telefone', 'requisitos','descricao','observacoes','user_id','vaga_aprovada'];
}