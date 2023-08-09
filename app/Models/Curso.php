<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nome','tipo'];

    public function _tipo()
    {
        return CursoTipo::get($this->tipo);
    }

    public function vagas()
    {
        return $this->belongsToMany(Vaga::class, 'vaga_cursos', 'curso_id', 'vaga_id');
    }
}
