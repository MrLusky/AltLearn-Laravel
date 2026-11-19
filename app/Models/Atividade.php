<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['nome', 'descricao', 'habilidades_bncc', 'relacao_pedagogica', 'status_implementacao'];
}