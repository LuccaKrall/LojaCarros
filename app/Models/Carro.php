<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'cor',
        'ano_fabricacao',
        'quilometragem_atual',
        'valor_total',
        'detalhes',
        'imagem_1_url',
        'imagem_2_url',
        'imagem_3_url',
    ];
}