<?php
namespace Database\Seeders;

use App\Models\Referencia;
use Illuminate\Database\Seeder;

class ReferenciaSeeder extends Seeder
{
    public function run(): void
    {
        $referencias = [
            ['ARAÚJO, Gisele Silva; SEABRA JUNIOR, Manoel Osmar', 'Elementos fundamentais para o design de jogos digitais com o foco no treino de competências e habilidades de estudantes com transtorno do espectro autista: uma revisão sistemática', 2021, 'Revista Brasileira de Estudos Pedagógicos, v. 102, n. 260, p. 120-147', 'https://www.scielo.br/j/rbeped/a/rCZGCqLWvNdVPsTq3kGJhcG/'],
            ['BRASIL', 'Base Nacional Comum Curricular', 2018, 'Ministério da Educação, Brasília, DF', 'https://basenacionalcomum.mec.gov.br/'],
            ['BRASIL', 'Lei nº 12.764, de 27 de dezembro de 2012. Institui a Política Nacional de Proteção dos Direitos da Pessoa com Transtorno do Espectro Autista', 2012, 'Presidência da República, Brasília, DF', 'https://www.planalto.gov.br/ccivil_03/_ato2011-2014/2012/lei/l12764.htm'],
            ['BRASIL', 'Lei nº 13.146, de 6 de julho de 2015. Institui a Lei Brasileira de Inclusão da Pessoa com Deficiência', 2015, 'Presidência da República, Brasília, DF', 'https://www.planalto.gov.br/ccivil_03/_ato2015-2018/2015/lei/l13146.htm'],
            ['GALLUD, Jose A. et al.', 'Technology-enhanced and game based learning for children with special needs: a systematic mapping study', 2023, 'Universal Access in the Information Society, v. 22, p. 227-240', 'https://doi.org/10.1007/s10209-021-00824-0'],
            ['GARTLAND, Sara et al.', 'The state of web accessibility for people with cognitive disabilities: a rapid evidence assessment', 2022, 'Behavioral Sciences, v. 12, n. 2, art. 26', 'https://doi.org/10.3390/bs12020026'],
            ['MDN', 'Progressive Web Apps', null, 'Mozilla Developer Network [s.d.]', 'https://developer.mozilla.org/pt-BR/docs/Web/Progressive_web_apps'],
            ['MENTONE, Emilia Cristina Pinheiro; FORTUNATO, Ivan', 'A tecnologia digital no auxílio à educação de autistas: os aplicativos ABC Autismo, Aiello e SCAI Autismo', 2019, 'Temas em Educação e Saúde, Araraquara, v. 15, n. 1, p. 113-130', 'https://doi.org/10.26673/tes.v15i1.12733'],
            ['SARAIVA, Ranniely Alves', 'Análise da interface do aplicativo Jade Autism', 2022, 'TCC (Design Digital) - Universidade Federal do Ceará, Campus de Quixadá', 'http://repositorio.ufc.br/handle/riufc/65601'],
            ['SCOTINI, Carolina Yoshida; ORSATI, Fernanda Tebexreni; MACEDO, Elizeu Coutinho', 'Levantamento e avaliação da acessibilidade de aplicativos para apoio ao aprendizado de crianças com diagnóstico de transtorno do espectro autista', 2021, 'Cadernos de Pós-Graduação em Distúrbios do Desenvolvimento, São Paulo, v. 21, n. 1, p. 39-67', 'https://doi.org/10.5935/cadernosdisturbios.v21n1p39-67'],
            ['SOUZA, Andiara Cristina de; BENITEZ, Priscila; CARMO, João dos Santos', 'Diretrizes de acessibilidade de interfaces digitais para pessoas com Transtorno do Espectro Autista: uma revisão integrativa de literatura', 2021, 'Revista Educação Especial, v. 34, e29, p. 1-21', 'https://doi.org/10.5902/1984686X62649'],
            ['W3C', 'Making content usable for people with cognitive and learning disabilities', 2021, 'W3C Working Group Note, 29 abr. 2021', 'https://www.w3.org/TR/coga-usable/'],
        ];

        foreach ($referencias as [$autores, $titulo, $ano, $veiculo, $url]) {
            Referencia::create(compact('autores', 'titulo', 'ano', 'veiculo', 'url'));
        }
    }
}