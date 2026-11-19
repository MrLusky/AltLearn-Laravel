<div class="space-y-14">

    {{-- ARTIGO --}}
    <section id="secoes" class="space-y-4">
        <h2 class="inline-block bg-[#1B3454] text-[#C9B6FF] px-4 py-2 rounded-lg text-xl font-bold">Artigo (seções)</h2>
        @foreach ($secoes as $secao)
            <article class="bg-white text-[#0E1A2B] rounded-lg shadow p-6">
                <h3 class="text-lg font-bold text-[#1B3454]">{{ trim($secao->numero . ' ' . $secao->titulo) }}</h3>
                <p class="mt-2 leading-relaxed text-gray-700">{{ $secao->conteudo }}</p>
            </article>
        @endforeach
    </section>

    {{-- ATIVIDADES --}}
    <section id="atividades" class="space-y-4">
        <h2 class="inline-block bg-[#1B3454] text-[#C9B6FF] px-4 py-2 rounded-lg text-xl font-bold">Atividades educacionais</h2>
        <div class="grid gap-4 md:grid-cols-2">
            @foreach ($atividades as $a)
                <article class="bg-white text-[#0E1A2B] rounded-lg shadow p-6">
                    <h3 class="text-lg font-bold text-[#1B3454]">{{ $a->nome }}</h3>
                    <p class="mt-2 text-gray-700">{{ $a->descricao }}</p>
                    <div class="mt-3 flex flex-wrap gap-1">
                        @foreach (explode(';', $a->habilidades_bncc) as $codigo)
                            <span class="bg-[#C9B6FF] text-[#0E1A2B] text-xs font-semibold px-2 py-0.5 rounded">{{ trim($codigo) }}</span>
                        @endforeach
                    </div>
                    <p class="mt-3 text-sm"><strong>Relação pedagógica:</strong> {{ $a->relacao_pedagogica }}</p>
                    <p class="mt-2 text-sm text-gray-500"><strong>Implementação:</strong> {{ $a->status_implementacao }}</p>
                </article>
            @endforeach
        </div>
    </section>

    {{-- RECURSOS --}}
    <section id="recursos" class="space-y-4">
        <h2 class="inline-block bg-[#1B3454] text-[#C9B6FF] px-4 py-2 rounded-lg text-xl font-bold">Recursos e tecnologias</h2>
        <div class="bg-white text-[#0E1A2B] rounded-lg shadow overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-[#1B3454] text-white">
                    <tr>
                        <th class="px-4 py-3 text-left">Nome</th>
                        <th class="px-4 py-3 text-left">Categoria</th>
                        <th class="px-4 py-3 text-left">Descrição</th>
                        <th class="px-4 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($recursos as $r)
                        @php
                            $cor = [
                                'Implementado'   => 'bg-green-100 text-green-800',
                                'Informado'      => 'bg-blue-100 text-blue-800',
                                'Não confirmado' => 'bg-amber-100 text-amber-800',
                            ][$r->status] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <tr>
                            <td class="px-4 py-3 font-semibold">{{ $r->nome }}</td>
                            <td class="px-4 py-3">{{ $r->categoria }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $r->descricao }}</td>
                            <td class="px-4 py-3"><span class="px-2 py-0.5 rounded text-xs font-semibold {{ $cor }}">{{ $r->status }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- REFERÊNCIAS --}}
    <section id="referencias" class="space-y-4">
        <h2 class="inline-block bg-[#1B3454] text-[#C9B6FF] px-4 py-2 rounded-lg text-xl font-bold">Referências</h2>
        <ul class="bg-white text-[#0E1A2B] rounded-lg shadow divide-y">
            @foreach ($referencias as $ref)
                <li class="p-4 text-sm leading-relaxed">
                    <strong>{{ $ref->autores }}.</strong> {{ $ref->titulo }}. {{ $ref->veiculo }}, {{ $ref->ano ?? 's.d.' }}.
                    @if ($ref->url)
                        <a href="{{ $ref->url }}" target="_blank" rel="noopener" class="text-[#1B3454] underline break-all">{{ $ref->url }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
</div>