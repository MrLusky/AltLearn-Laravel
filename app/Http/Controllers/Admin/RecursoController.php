<?php
namespace App\Http\Controllers\Admin;

use App\Models\Recurso;

class RecursoController extends CrudController
{
    protected string $modelo = Recurso::class;
    protected string $rota = 'admin.recursos';
    protected string $titulo = 'Recursos e Tecnologias';
    protected array $colunas = ['nome', 'categoria', 'status'];
    protected array $campos = [
        'nome'      => ['label' => 'Nome', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'categoria' => ['label' => 'Categoria', 'tipo' => 'select', 'opcoes' => ['Tecnologia', 'Personalização', 'PWA'], 'regras' => 'required|in:Tecnologia,Personalização,PWA'],
        'descricao' => ['label' => 'Descrição', 'tipo' => 'textarea', 'regras' => 'required|string'],
        'status'    => ['label' => 'Status', 'tipo' => 'select', 'opcoes' => ['Implementado', 'Informado', 'Não confirmado'], 'regras' => 'required|in:Implementado,Informado,Não confirmado'],
    ];
}