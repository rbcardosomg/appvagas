<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "vagas";

    protected $fillable = ['area_atuacao','remuneracao', 'data_limite_procura', 'contato_email','contato_link',
        'contato_telefone', 'requisitos','descricao','observacoes','user_id','tipo', 'vaga_status'];
    
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'vaga_cursos', 'vaga_id', 'curso_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function _status()
    {
        return VagaStatus::get($this->vaga_status);
    }

    public function _tipo()
    {
        return VagaTipo::get($this->tipo);
    }
}