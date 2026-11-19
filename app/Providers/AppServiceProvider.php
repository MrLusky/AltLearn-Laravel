<?php

namespace App\Providers;

use App\Models\Atividade;
use App\Models\Recurso;
use App\Models\Referencia;
use App\Models\Secao;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.conteudo-tcc', function ($view) {
            $view->with([
                'secoes' => Secao::orderBy('ordem')->get(),
                'atividades' => Atividade::orderBy('id')->get(),
                'recursos' => Recurso::orderBy('id')->get(),
                'referencias' => Referencia::orderBy('autores')->get(),
            ]);
        });
    }
}
