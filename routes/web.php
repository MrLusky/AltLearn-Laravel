<?php

use App\Http\Controllers\Admin\AtividadeController;
use App\Http\Controllers\Admin\RecursoController;
use App\Http\Controllers\Admin\ReferenciaController;
use App\Http\Controllers\Admin\SecaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página inicial pública (frontend)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Painel (qualquer usuário logado: admin ou comum)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// CRUD (somente admin): middlewares auth + admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('secoes', SecaoController::class)->except('show')->parameters(['secoes' => 'secao']);
    Route::resource('atividades', AtividadeController::class)->except('show');
    Route::resource('recursos', RecursoController::class)->except('show');
    Route::resource('referencias', ReferenciaController::class)->except('show');
});

require __DIR__ . '/auth.php';

// Rota Fallback: qualquer URL inexistente
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});