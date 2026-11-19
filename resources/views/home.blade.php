<x-publico-layout>
    <section class="bg-[#1B3454]">
        <div class="max-w-6xl mx-auto px-4 py-16">
            <p class="text-[#C9B6FF] uppercase tracking-widest text-sm">{{ config('tcc.evento') }}</p>
            <p class="text-white/70 text-sm">{{ config('tcc.tema') }} · {{ config('tcc.local') }}</p>
            <h1 class="mt-4 text-3xl md:text-5xl font-extrabold leading-tight">{{ config('tcc.titulo') }}</h1>
            <p class="mt-4 italic text-white/80">{{ config('tcc.titulo_en') }}</p>
            <p class="mt-2 italic text-white/80">{{ config('tcc.titulo_es') }}</p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (config('tcc.autores') as $autor)
                    <div class="rounded-lg bg-[#0E1A2B] p-4 border border-[#C9B6FF]/30">
                        <p class="font-semibold">{{ $autor['nome'] }}</p>
                        <p class="text-xs text-[#C9B6FF]">{{ $autor['papel'] }}</p>
                        <p class="text-xs text-white/60 break-all">{{ $autor['email'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 space-y-2 text-sm">
                @foreach (config('tcc.palavras_chave') as $idioma => $palavras)
                    <p>
                        <span class="font-semibold text-[#C9B6FF] uppercase">{{ $idioma }}:</span>
                        {{ implode(' · ', $palavras) }}
                    </p>
                @endforeach
            </div>
            <p class="mt-6 text-xs text-white/50">Licença: {{ config('tcc.licenca') }}</p>
        </div>
    </section>

    <div class="max-w-6xl mx-auto px-4 py-12">
        @include('partials.conteudo-tcc')
    </div>
</x-publico-layout>