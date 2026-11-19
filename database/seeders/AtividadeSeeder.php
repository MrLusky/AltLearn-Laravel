<?php
namespace Database\Seeders;

use App\Models\Atividade;
use Illuminate\Database\Seeder;

class AtividadeSeeder extends Seeder
{
    public function run(): void
    {
        $semNiveis = 'Atividade básica descrita como parte da aplicação. A quantidade de níveis e a progressão de dificuldade não estão especificadas.';

        $atividades = [
            [
                'nome' => 'Associação entre imagem e palavra',
                'descricao' => 'Selecionar a palavra correspondente a uma imagem.',
                'habilidades_bncc' => 'EF01LP08; EF01LP09; EF02LP04',
                'relacao_pedagogica' => 'Relacionar sons e formas escritas, comparar sons iniciais de sílabas e identificar padrões familiares de escrita.',
                'status_implementacao' => 'A atividade básica está descrita. A progressão proposta (imagem + palavra, depois apenas texto) está presente em forma de níveis, mas não é detalhada nível por nível.',
            ],
            [
                'nome' => 'Caça aos sons',
                'descricao' => 'Selecionar uma letra em resposta a uma instrução auditiva.',
                'habilidades_bncc' => 'EF01LP07; EF01LP08; EF01LP09; EF02LP02',
                'relacao_pedagogica' => 'Identificar fonemas e suas representações por letras, relacionando sons e escrita e manipulando sílabas.',
                'status_implementacao' => 'A atividade básica está descrita. As etapas de identificação de palavras e sons iniciais são apresentadas como possíveis níveis posteriores, mas não há confirmação de sua implementação.',
            ],
            [
                'nome' => 'Arrastar e soltar',
                'descricao' => 'Arrastar elementos visuais para suas respectivas categorias, como animais, frutas e meios de transporte.',
                'habilidades_bncc' => 'EF01MA09; EF01LP15',
                'relacao_pedagogica' => 'Agrupar objetos por atributos, como cor ou formato, e agrupar palavras por critérios semânticos. O código depende da ação efetivamente utilizada em cada jogo.',
                'status_implementacao' => $semNiveis,
            ],
            [
                'nome' => 'Sequência de rotina',
                'descricao' => 'Organizar cartões que representam ações do cotidiano (escovar os dentes, vestir-se, tomar café da manhã, ir à escola) em uma sequência.',
                'habilidades_bncc' => 'EF01MA10; EF02MA09; EF02MA10',
                'relacao_pedagogica' => 'Reconhecer e completar sequências e descrever regularidades. A correspondência de índices nos cartões representa rotinas cotidianas, e não padrões numéricos.',
                'status_implementacao' => $semNiveis,
            ],
            [
                'nome' => 'Matemática visual',
                'descricao' => 'Atividades de contagem visual e tarefas matemáticas, como completar uma sequência numérica com um valor ausente (Jogo dos Números).',
                'habilidades_bncc' => 'EF01MA01; EF01MA02; EF01MA04; EF02MA05; EF02MA09',
                'relacao_pedagogica' => 'Utilizar números para representar quantidades ou ordens, realizar contagens e trabalhar com operações básicas de adição e subtração e sequências numéricas.',
                'status_implementacao' => 'Uma sequência de 5 níveis é apresentada na captura de tela do Jogo dos Números. A disponibilidade de todas as operações descritas e dos níveis não está documentada.',
            ],
        ];

        foreach ($atividades as $atividade) {
            Atividade::create($atividade);
        }
    }
}