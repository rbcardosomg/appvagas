<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome','documento', 'area_atuacao_empresa', 'telefone','rua',
        'bairro', 'numero','cidade','estado'];

    public function _usuario()
    {
        return $this->hasOne(User::class);
    }

    public function getEndereco()
    {
        $endereco = "$this->rua, $this->numero, $this->bairro - $this->cidade - $this->estado";
        return $endereco;
    }
}