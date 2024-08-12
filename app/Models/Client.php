<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
    ];
}
