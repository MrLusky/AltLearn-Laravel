<?php
namespace App\Http\Controllers\Admin;

use App\Models\Referencia;

class ReferenciaController extends CrudController
{
    protected string $modelo = Referencia::class;
    protected string $rota = 'admin.referencias';
    protected string $titulo = 'Referências';
    protected array $colunas = ['autores', 'titulo', 'ano'];
    protected array $campos = [
        'autores' => ['label' => 'Autores', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'titulo'  => ['label' => 'Título', 'tipo' => 'textarea', 'regras' => 'required|string'],
        'ano'     => ['label' => 'Ano', 'tipo' => 'number', 'regras' => 'nullable|integer|min:1900|max:2100'],
        'veiculo' => ['label' => 'Veículo / Editora', 'tipo' => 'text', 'regras' => 'required|string|max:255'],
        'url'     => ['label' => 'Link', 'tipo' => 'url', 'regras' => 'nullable|url|max:500'],
    ];
}