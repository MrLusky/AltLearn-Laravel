<?php
namespace App\Http\Controllers\Admin;

use App\Models\Secao;

class SecaoController extends CrudController
{
    protected string $modelo = Secao::class;
    protected string $rota = 'admin.secoes';
    protected string $titulo = 'Seções do Artigo';
    protected array $colunas = ['ordem', 'numero', 'titulo'];
    protected array $campos = [
        'numero'   => ['label' => 'Número (ex.: 2.1)', 'tipo' => 'text', 'regras' => 'nullable|string|max:10'],
        'titulo'   => ['label' => 'Título', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'conteudo' => ['label' => 'Conteúdo', 'tipo' => 'textarea', 'regras' => 'required|string'],
        'ordem'    => ['label' => 'Ordem de exibição', 'tipo' => 'number', 'regras' => 'required|integer|min:0'],
    ];
}