<?php
namespace Database\Seeders;

use App\Models\Recurso;
use Illuminate\Database\Seeder;

class RecursoSeeder extends Seeder
{
    public function run(): void
    {
        $recursos = [
            ['React', 'Tecnologia', 'Biblioteca utilizada no frontend (interface) do AltLearn.', 'Informado'],
            ['Vite', 'Tecnologia', 'Ferramenta de build utilizada no frontend.', 'Informado'],
            ['Laravel', 'Tecnologia', 'Framework do backend: serviços, comunicação com a API, autenticação e acesso ao banco de dados.', 'Informado'],
            ['PHP', 'Tecnologia', 'Linguagem do backend.', 'Informado'],
            ['MySQL', 'Tecnologia', 'Banco de dados para a persistência dos dados.', 'Informado'],
            ['Alto contraste', 'Personalização', 'Altera a diferenciação visual dos elementos da interface.', 'Implementado'],
            ['Tamanho da fonte', 'Personalização', 'Permite ajustar a apresentação do texto.', 'Implementado'],
            ['Controle de som', 'Personalização', 'Permite ativar ou desativar os estímulos auditivos.', 'Implementado'],
            ['Controle de vibração', 'Personalização', 'Vibração em dispositivos móveis. Não confirmada nos materiais analisados.', 'Não confirmado'],
            ['Manifesto e service worker', 'PWA', 'Instalabilidade e cache. A configuração não pôde ser confirmada nos materiais técnicos.', 'Não confirmado'],
            ['Funcionamento offline e armazenamento local', 'PWA', 'Uso sem conexão e persistência local de dados. Exige confirmação técnica adicional.', 'Não confirmado'],
        ];

        foreach ($recursos as [$nome, $categoria, $descricao, $status]) {
            Recurso::create(compact('nome', 'categoria', 'descricao', 'status'));
        }
    }
}