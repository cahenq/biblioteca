<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo',
        'numero_matricula',
        'email',
        'telefone',
        'serie',
        'turma',
        'turno',
        'endereco',
    ];
    protected $table = 'leitores';
}
