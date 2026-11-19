<?php
namespace App\Http\Controllers\Admin;

use App\Models\Atividade;

class AtividadeController extends CrudController
{
    protected string $modelo = Atividade::class;
    protected string $rota = 'admin.atividades';
    protected string $titulo = 'Atividades Educacionais';
    protected array $colunas = ['nome', 'habilidades_bncc', 'descricao'];
    protected array $campos = [
        'nome'                 => ['label' => 'Nome', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'descricao'            => ['label' => 'Descrição', 'tipo' => 'textarea', 'regras' => 'required|string'],
        'habilidades_bncc'     => ['label' => 'Habilidades da BNCC (separe por ;)', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'relacao_pedagogica'   => ['label' => 'Relação pedagógica', 'tipo' => 'textarea', 'regras' => 'required|string'],
        'status_implementacao' => ['label' => 'Situação da implementação', 'tipo' => 'textarea', 'regras' => 'required|string'],
    ];
}