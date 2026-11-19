<?php
namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Recurso;
use App\Models\Referencia;
use App\Models\Secao;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totais' => [
                'Seções do artigo' => Secao::count(),
                'Atividades'       => Atividade::count(),
                'Recursos'         => Recurso::count(),
                'Referências'      => Referencia::count(),
            ],
        ]);
    }
}