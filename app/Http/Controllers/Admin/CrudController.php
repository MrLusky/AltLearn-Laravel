<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    protected string $modelo;
    protected string $rota;
    protected string $titulo;
    protected array $campos = [];
    protected array $colunas = [];

    public function index()
    {
        $itens = $this->modelo::orderBy('id')->paginate(10);

        return view('admin.crud.index', $this->dados() + ['itens' => $itens]);
    }

    public function create()
    {
        return view('admin.crud.form', $this->dados() + ['item' => new $this->modelo]);
    }

    public function store(Request $request)
    {
        $this->modelo::create($request->validate($this->regras()));

        return redirect()->route($this->rota . '.index')->with('sucesso', 'Registro criado com sucesso!');
    }

    public function edit(int $id)
    {
        return view('admin.crud.form', $this->dados() + ['item' => $this->modelo::findOrFail($id)]);
    }

    public function update(Request $request, int $id)
    {
        $item = $this->modelo::findOrFail($id);
        $item->update($request->validate($this->regras()));

        return redirect()->route($this->rota . '.index')->with('sucesso', 'Registro atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->modelo::findOrFail($id)->delete();

        return redirect()->route($this->rota . '.index')->with('sucesso', 'Registro excluído com sucesso!');
    }

    protected function regras(): array
    {
        return collect($this->campos)->map(fn ($campo) => $campo['regras'])->all();
    }

    protected function dados(): array
    {
        return [
            'rota' => $this->rota,
            'titulo' => $this->titulo,
            'campos' => $this->campos,
            'colunas' => $this->colunas,
        ];
    }
}